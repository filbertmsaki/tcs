<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Quotation;
use App\Models\Services\SmartPayService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Rmunate\Utilities\SpellNumber;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect()->route('login');
    }
    public function receipt(Request $request, $requestId)
    {
        if (!$request->hasValidSignature()) {
            abort(404);
        }
        try {
            $quotation = Quotation::where('requestId', $requestId)->first();
            if ($quotation) {
                $imagePath = public_path('images/alliance-square-logo.png');
                $imageData = base64_encode(file_get_contents($imagePath));
                $imageBase64 = 'data:image/png;base64,' . $imageData;

                $policyInfoPath = public_path('images/policy-info.jpg');
                $policyInfoData = base64_encode(file_get_contents($policyInfoPath));
                $policyInfoBase64 = 'data:image/png;base64,' . $policyInfoData;
                $data = [
                    'logo' => $imageBase64,
                    'policy_info' => $policyInfoBase64,
                    'qr_code' => null,
                    'riskNoteNumber' => @$quotation->coverNoteNumber,
                    'coverNoteStartDate' => Carbon::parse(@$quotation->coverNoteStartDate)->format('d-M-Y h:iA'),
                    'coverNoteEndDate' => Carbon::parse(@$quotation->coverNoteEndDate)->format('d-M-Y h:iA'),
                    'coverNoteIssedDate' => Carbon::parse(@$quotation->created_at)->format('d-M-Y'),
                    'totalPremiumIncludingTax' => number_format(@$quotation->totalPremiumIncludingTax, 2),
                    'totalPremiumIncludingTaxInWords' => ucwords(SpellNumber::value(@$quotation->totalPremiumIncludingTax)->locale('en')->currency('Tanzanian Shillings')->fraction('Cents')->toMoney()),
                    'coverNoteReferenceNumber' => @$quotation->coverNoteReferenceNumber,
                    'riskCode' => @$quotation->risk->riskCode,
                    'sumInsured' => number_format(@$quotation->risk->sumInsured, 2),
                    'premiumExcludingTaxEquivalent' => number_format(@$quotation->risk->premiumExcludingTaxEquivalent, 2),
                    'premiumIncludingTax' => number_format(@$quotation->risk->premiumIncludingTax, 2),
                    'taxAmount' => number_format(@$quotation->risk->risk_tax->taxAmount, 2),
                    'stickerNumber' => @$quotation->stickerNumber,
                    'policyNumber' => "",
                    'riskName' => "Third Party Only",
                    'policyHolderName' => @$quotation->policy_holder->policyHolderName,
                    'policyPostalAddress' => @$quotation->policy_holder->postalAddress,
                    'taxInvoice' => "",
                    'debitNo' => "",
                    'fileNo' => "",
                    'insurerName' => "Alliance Insurance Corporation Ltd",
                    'intermediary' => "",
                    'registrationNumber' => @$quotation->motor_details->registrationNumber,
                    'make' => @$quotation->motor_details->make,
                    'model' => @$quotation->motor_details->model,
                    'bodyType' => @$quotation->motor_details->bodyType,
                    'color' => @$quotation->motor_details->color,
                    'engineNumber' => @$quotation->motor_details->engineNumber,
                    'engineCapacity' => @$quotation->motor_details->engineCapacity,
                    'chassisNumber' => @$quotation->motor_details->chassisNumber,
                    'sittingCapacity' => @$quotation->motor_details->sittingCapacity,
                    'yearOfManufacture' => @$quotation->motor_details->yearOfManufacture,
                    'issuedBy' => "WARDAT",
                ];
                $pdf =  Pdf::loadView('admin.receipt', compact('data'));
                $pdf->getDomPdf()->getOptions()->set('isPhpEnabled', true);
                $pdf->getDomPDF()->getOptions()->set('isHtml5ParserEnabled', true);
                $pdf->getDomPDF()->setPaper('a4', 'portrait');
                return $pdf->download('receipt-' . $quotation->requestId . '.pdf');
            } else {
                return redirect()->back()->with('error', 'Cover note details not found');
            }
        } catch (Exception $e) {

            return $e->getMessage();
            return redirect()->back()->with('error', 'Unknown error occur.');
        }
    }


    public function test_payment(Request $request)
    {
        $paymentData = [
            'name' => 'Filbert Msaki',
            'email' => 'filymsaki@gmail.com',
            'amount' => 100,
            'currency' => 'TZS',
            'date' => Carbon::now()->format('YmdHis'),
            'requestId' => "AIC-CNRR-27-06-0001",
            'description' => 'Insurance premium payment',
            'msisdn' => '255762650393'
        ];
       $paymentRequest = SmartPayService::createToken();
        $paymentRequest = SmartPayService::createPayment($paymentData);
       $paymentResponse = $paymentRequest->getData();
        $paymentMesage = $paymentResponse->message;
        $paymentData = $paymentResponse->data;
        $paymentStatuscode = $paymentRequest->getStatusCode();
        if ($paymentStatuscode == Response::HTTP_OK) {
            return ['status_code' => Response::HTTP_OK, 'message' =>  $paymentMesage, 'data' => null];
        } else {
            $msg = trans('menu.connection_error');
            return ['status_code' => Response::HTTP_BAD_REQUEST, 'message' =>  $paymentMesage, 'data' => null];
        }
    }
}

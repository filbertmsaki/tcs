<?php

namespace App\Http\Controllers;

use App\Enums\CalculationTypeEnum;
use App\Enums\StatusEnum;
use App\Enums\UssdStatusEnum;
use App\Models\CoverCategory;
use App\Models\CoverNoteAddon;
use App\Models\CoverNoteAddonTax;
use App\Models\CoverProduct;
use App\Models\CoverRisk;
use App\Models\MotorDetail;
use App\Models\Payment;
use App\Models\PolicyHolder;
use App\Models\Quotation;
use App\Models\Risk;
use App\Models\RiskDiscount;
use App\Models\RiskTax;
use App\Models\Services\AppServices;
use App\Models\Services\Tiramis;
use App\Models\SubjectMatter;
use App\Models\User;
use App\Models\USSDRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\CarbonPeriod;
use DB;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Rmunate\Utilities\SpellNumber;
use Illuminate\Validation\Rule;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class DashboardController extends Controller
{
    public function server_info()
    {
        return view('admin.server-info');
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $successful_covers = Quotation::where('status', StatusEnum::Complete->value)->count();
            $pending_covers = Quotation::where('status', StatusEnum::Pending->value)->count();
            $fail_covers = Quotation::where('status', StatusEnum::Fail->value)->count();
            return response()->json([
                'message' =>  "Data fetched.",
                'data' => compact('successful_covers', 'pending_covers', 'fail_covers')
            ]);
        }
        return view('admin.dashboard');
    }
    public function weekAnalytics()
    {
        $this_week_date_from = Carbon::now()->subDays(6)->startOfDay()->toDateTimeString();
        $this_week_date_to  = Carbon::now()->endOfDay()->toDateTimeString();
        $this_week_cover = Quotation::whereBetween('created_at', [$this_week_date_from,  $this_week_date_to])
            ->orderBy('created_at', 'DESC')->where('status', StatusEnum::Complete->value)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))
            ->select(
                'created_at',
                DB::raw('count(*) as cover_count'),
                DB::raw('SUM(totalPremiumIncludingTax) as totalPremiumIncludingTax')
            )
            ->get();
        $this_week_sales_array = [];
        $this_week_sales_period = CarbonPeriod::create($this_week_date_from, $this_week_date_to);
        foreach ($this_week_sales_period as $this_week_sales_date) {
            $this_week_is_executed = false;
            foreach ($this_week_cover as $key => $this_week_sale) {
                if (date('Y-m-d', strtotime($this_week_sales_date))  == date('Y-m-d', strtotime($this_week_sale->created_at))) {
                    $this_week_sales_data['cover_count'] = $this_week_sale->cover_count;
                    $this_week_sales_data['totalPremiumIncludingTax'] = $this_week_sale->totalPremiumIncludingTax;
                    $this_week_sales_data['sale_date'] = date('Y-m-d', strtotime($this_week_sale->created_at));
                    $this_week_sales_data['sale_date_day'] = date('D', strtotime($this_week_sale->created_at));
                    $this_week_is_executed = true;
                    $this_week_sales_array[] = $this_week_sales_data;
                    break;
                }
            }
            if (!$this_week_is_executed) {
                $this_week_sales_data['cover_count'] =  (float)0;
                $this_week_sales_data['totalPremiumIncludingTax'] =  (float)0;
                $this_week_sales_data['sale_date'] = $this_week_sales_date->format('Y-m-d');
                $this_week_sales_data['sale_date_day'] = $this_week_sales_date->format("D");
                $this_week_sales_array[] = $this_week_sales_data;
            }
        }
        $uniqueDayLabels = [];
        $uniqueDateLabels = [];
        $this_week_cover_count = [];
        $this_week_total_premium_including_tax = [];
        foreach ($this_week_sales_array as $date => $combinedResult) {
            $this_week_cover_count[] = $combinedResult['cover_count'];
            $this_week_total_premium_including_tax[] = $combinedResult['totalPremiumIncludingTax'];
            $uniqueDayLabels[] = date('D', strtotime($combinedResult['sale_date']));
            $uniqueDateLabels[] = date('Y-m-d', strtotime($combinedResult['sale_date']));
        }
        /**** Previously Last 7 days Sales **** */
        $last_week_date_from = Carbon::now()->subDays(13)->startOfDay()->toDateTimeString();
        $last_week_date_to = Carbon::now()->subDays(7)->endOfDay()->toDateTimeString();
        $last_week_cover = Quotation::whereBetween('created_at', [$last_week_date_from,  $last_week_date_to])
            ->orderBy('created_at', 'DESC')->where('status', StatusEnum::Complete->value)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d-%m-%Y')"))
            ->select(
                'created_at',
                DB::raw('count(*) as cover_count'),
                DB::raw('SUM(totalPremiumIncludingTax) as totalPremiumIncludingTax')
            )
            ->get();
        $last_week_sales_array = [];
        $last_week_sales_period = CarbonPeriod::create($last_week_date_from, $last_week_date_to);
        foreach ($last_week_sales_period as $last_week_sales_date) {
            $last_week_is_executed = false;
            foreach ($last_week_cover as $key => $last_week_sale) {
                if (date('Y-m-d', strtotime($last_week_sales_date))  == date('Y-m-d', strtotime($last_week_sale->created_at))) {
                    $last_week_sales_data['cover_count'] = $last_week_sale->cover_count;
                    $last_week_sales_data['totalPremiumIncludingTax'] = $last_week_sale->totalPremiumIncludingTax;
                    $last_week_sales_data['sale_date'] = date('Y-m-d', strtotime($last_week_sale->created_at));
                    $last_week_sales_data['sale_date_day'] = date('D', strtotime($last_week_sale->created_at));
                    $last_week_is_executed = true;
                    $last_week_sales_array[] = $last_week_sales_data;
                    break;
                }
            }
            if (!$last_week_is_executed) {
                $last_week_sales_data['cover_count'] =  (float)0;
                $last_week_sales_data['totalPremiumIncludingTax'] =  (float)0;
                $last_week_sales_data['sale_date'] = $last_week_sales_date->format('Y-m-d');
                $last_week_sales_data['sale_date_day'] = $last_week_sales_date->format("D");
                $last_week_sales_array[] = $last_week_sales_data;
            }
        }
        $last_week_cover_count = [];
        $last_week_total_premium_including_tax = [];
        foreach ($last_week_sales_array as $date => $last_week_result) {
            $last_week_cover_count[] = $last_week_result['cover_count'];
            $last_week_total_premium_including_tax[] = $last_week_result['totalPremiumIncludingTax'];
            $last_week_uniqueDayLabels[] = date('D', strtotime($last_week_result['sale_date']));
            $last_week_uniqueDateLabels[] = date('Y-m-d', strtotime($last_week_result['sale_date']));
        }
        return response()->json([
            'label' => $last_week_uniqueDayLabels,
            'this_week_cover_count' => $this_week_cover_count,
            'this_week_total_premium_including_tax' => $this_week_total_premium_including_tax,
            'last_week_cover_count' => $last_week_cover_count,
            'last_week_total_premium_including_tax' => $last_week_total_premium_including_tax,
        ]);
    }
    public function  productAnalytics()
    {
        $date_from = Carbon::now()->subDays(6)->startOfDay()->toDateTimeString();
        $date_to  = Carbon::now()->endOfDay()->toDateTimeString();
        $productsData = Quotation::join('cover_products', 'cover_products.product_code', 'quotations.productCode')->orderBy('quotations.created_at', 'DESC')
            ->whereBetween('quotations.created_at', [$date_from,  $date_to])
            ->where('quotations.status', StatusEnum::Complete->value)
            ->groupBy('quotations.productCode')
            ->select(
                'cover_products.product_code',
                'cover_products.product_name',
                'quotations.created_at',
                DB::raw("count('quotations.*') as cover_count"),
                DB::raw("SUM(quotations.totalPremiumIncludingTax) as totalPremiumIncludingTax")
            )
            ->get();
        $productLabels = [];
        $productCount = [];
        $productAmount = [];
        $color = [];
        foreach ($productsData as $date => $last_week_result) {
            $productCount[] = $last_week_result['cover_count'];
            $productAmount[] = $last_week_result['totalPremiumIncludingTax'];
            $productLabels[] = $last_week_result['product_name'];
            $color[] = random_color();
        }
        return response()->json([
            'label' => $productLabels,
            'productCount' => $productCount,
            'color' => $color,
        ]);
    }
    public function receipt($requestId)
    {
        try {
            $quotation = Quotation::where('requestId', $requestId)->first();
            if ($quotation) {
                $imagePath = public_path('images/alliance-square-logo.png');
                $imageData = base64_encode(file_get_contents($imagePath));
                $imageBase64 = 'data:image/png;base64,' . $imageData;
                $data = [
                    'logo' => $imageBase64,
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
                // return $data;
                $pdf =  Pdf::loadView('admin.receipt', compact('data'));
                $pdf->getDomPdf()->getOptions()->set('isPhpEnabled', true);
                $pdf->getDomPDF()->getOptions()->set('isHtml5ParserEnabled', true);
                $pdf->getDomPDF()->setPaper('a4', 'portrait');
                return $pdf->stream('receipt.pdf');
                return view('admin.receipt', compact('data'));
            }
            return 'NULL';
        } catch (Exception $e) {
            return $e;
        }
    }
    public function paymentCallback(Request $request)
    {
        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/payment_callback.log'),
        ])->info('Payment callback received', ['request' => $request->all()]);
        $content = $request->getContent();
        $data = json_decode($content, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('JSON decoding failed', ['content' => $content]);
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid JSON payload'
            ], 400);
        }
        $payment = Payment::where('requestId', $data['requestId'])->first();
        if ($payment) {
            $payment->update([
                'respCode' => $data['respCode'],
                'respDesc' => $data['respDesc'],
                'acknowledgementId' => $data['acknowledgementId'],
                'paid_amount' => $data['amount'],
                'paid_currency' => $data['currency'],
                'transactionId' => $data['transactionId'],
                'status' => 'complete'
            ]);
            $text = "Your payment of TZS " . $data['amount'] . " has been successfully received by Alliance Insurance Company. Thanks for choosing us.";
            $sms = AppServices::sms("255762650393", $text);
            $result = $this->ussdPayment($request, $data['requestId']);
            return response()->json([
                'status' => 'success',
                'message' => 'Callback received'
            ]);
        }
    }
    public function ussdPayment(Request $request, $requestId)
    {
        $ussd_request = USSDRequest::where('quotationRequestId', $requestId)->where('status', UssdStatusEnum::Submitted->value)->first();
        if ($ussd_request) {
            $request->merge([
                'motorRegistrationNumber' => $ussd_request->motorRegistrationNumber
            ]);
            $coverNoteVerification = Tiramis::coverNoteVerification($request);
            $coverNoteVerificationResponse = $coverNoteVerification->getData();
            $coverNoteVerificationMessage = $coverNoteVerificationResponse->message;
            $coverNoteVerificationData = $coverNoteVerificationResponse->data;
            $coverNoteVerificationCode = $coverNoteVerification->getStatusCode();
            if ($coverNoteVerificationCode == Response::HTTP_OK) {
                $request->merge([
                    'motorCategory' => $coverNoteVerificationData->MotorDtl->MotorCategory
                ]);
                $motorVerification = Tiramis::motorVerification($request);
                $motorVerificationResponse = $motorVerification->getData();
                $motorVerificationMessage = $motorVerificationResponse->message;
                $motorVerificationData = $motorVerificationResponse->data;
                $motorVerificationCode = $motorVerification->getStatusCode();
                if ($motorVerificationCode == Response::HTTP_OK) {
                    $startDate = Carbon::now()->addHours(3);
                    $endDate = $startDate->copy()->addYear()->subDay();
                    $coverNoteStartDate = $startDate->format('Y-m-d\TH:i:s');
                    $coverNoteEndDate = $endDate->format('Y-m-d\TH:i:s');
                    $productName = ucwords(str_replace('_', ' ', $ussd_request->productName));
                    $policyHolders = array();
                    if (collect($coverNoteVerificationData->PolicyHolders)->isEmpty()) {
                        $msg = trans('menu.connection_error');
                        return ['status_code' => Response::HTTP_BAD_REQUEST, 'message' =>  $msg, 'data' => null];
                    }
                    $policyHolders = [];
                    $policyHoldersKey = 0;
                    foreach ($coverNoteVerificationData->PolicyHolders as $key => $policyHolder) {
                        $policyHolders[$policyHoldersKey] = [
                            'policyHolderName' => isset($policyHolder->PolicyHolderName) ?  $policyHolder->PolicyHolderName : "",
                            'policyHolderBirthDate' => isset($policyHolder->PolicyHolderBirthDate) ?  $policyHolder->PolicyHolderBirthDate : "2000-01-01",
                            'policyHolderType' => isset($policyHolder->PolicyHolderType) ?  $policyHolder->PolicyHolderType : "",
                            'policyHolderIdNumber' => isset($policyHolder->PolicyHolderIdNumber) ?  $policyHolder->PolicyHolderIdNumber : "",
                            'policyHolderIdType' => isset($policyHolder->PolicyHolderIdType) ?  $policyHolder->PolicyHolderIdType : "",
                            'gender' => isset($policyHolder->Gender) ?  $policyHolder->Gender : "",
                            'countryCode' => isset($policyHolder->CountryCode) ?  $policyHolder->CountryCode : "",
                            'region' => isset($policyHolder->Region) ?  $policyHolder->Region : "",
                            'district' => isset($policyHolder->District) ?  $policyHolder->District : "",
                            'street' => isset($policyHolder->Street) && !(is_object($policyHolder->Street) && empty((array)$policyHolder->Street)) ? $policyHolder->Street : "",
                            'policyHolderPhoneNumber' => isset($policyHolder->PolicyHolderPhoneNumber) ?  $policyHolder->PolicyHolderPhoneNumber : "",
                            'policyHolderFax' => isset($policyHolder->PolicyHolderFax) && !(is_object($policyHolder->PolicyHolderFax) && empty((array)$policyHolder->PolicyHolderFax)) ? $policyHolder->PolicyHolderFax : "",
                            'postalAddress' => isset($policyHolder->PostalAddress) && !(is_object($policyHolder->PostalAddress) && empty((array)$policyHolder->PostalAddress)) ? $policyHolder->PostalAddress : "",
                            'emailAddress' => isset($policyHolder->EmailAddress) && !(is_object($policyHolder->EmailAddress) && empty((array)$policyHolder->EmailAddress)) ? $policyHolder->EmailAddress : ""
                        ];
                        $policyHoldersKey++;
                    }
                    $request->merge([
                        'requestId' =>  request_id(Quotation::class, 'AICCNRR'),
                        'coverNoteNumber' => generateRandomUniqueNumber(Quotation::class, 'coverNoteNumber'),
                        'coverNoteType' => 1,
                        'prevCoverNoteReferenceNumber' => '',
                        'coverNoteStartDate' => $coverNoteStartDate,
                        'coverNoteEndDate' => $coverNoteEndDate,
                        'coverNoteDesc' => $productName,
                        'operativeClause' => $productName,
                        'paymentMode' => 1,
                        'currencyCode' => 'TZS',
                        'exchangeRate' => 1,
                        'totalPremiumExcludingTax' => $ussd_request->totalPremiumExcludingTax,
                        'totalPremiumIncludingTax' => $ussd_request->totalPremiumIncludingTax,
                        'commisionPaid' => 0,
                        'commisionRate' => 0,
                        'officerName' => 'NURU',
                        'officerTitle' => 'NURU',
                        'productCode' => $ussd_request->productCode,
                        'endorsementType' => '',
                        'endorsementReason' => '',
                        'endorsementPremiumEarned' => '',
                        'risksCovered' => [
                            [
                                'riskCode' => $ussd_request->riskCode,
                                'sumInsured' => $ussd_request->sumInsured,
                                'sumInsuredEquivalent' =>  $ussd_request->sumInsured,
                                'premiumRate' =>  $ussd_request->premiumRate,
                                'premiumBeforeDiscount' =>  $ussd_request->totalPremiumExcludingTax,
                                'premiumAfterDiscount' =>  $ussd_request->totalPremiumExcludingTax,
                                'premiumExcludingTaxEquivalent' =>  $ussd_request->totalPremiumExcludingTax,
                                'premiumIncludingTax' => $ussd_request->totalPremiumIncludingTax,
                                'discountsOffered' => [],
                                'taxesCharged' => [
                                    [
                                        'taxCode' => 'VAT-MAINLAND',
                                        'isTaxExempted' => 'N',
                                        'taxExemptionType' => '',
                                        'taxExemptionReference' => '',
                                        'taxRate' => 0.18,
                                        'taxAmount' => $ussd_request->taxAmount
                                    ]
                                ]
                            ]
                        ],
                        'subjectMattersCovered' => [
                            [
                                'subjectMatterReference' => time(),
                                'subjectMatterDesc' => $productName
                            ]
                        ],
                        'coverNoteAddons' => [],
                        'policyHolders' =>
                        $policyHolders,
                        'motorDtl' => [
                            'motorCategory' => isset($motorVerificationData->MotorCategory) ? $motorVerificationData->MotorCategory : "",
                            'motorType' => isset($motorVerificationData->MotorType) ? $motorVerificationData->MotorType : 1,
                            'registrationNumber' => isset($motorVerificationData->RegistrationNumber) ? $motorVerificationData->RegistrationNumber : "",
                            'chassisNumber' => isset($motorVerificationData->ChassisNumber) ? $motorVerificationData->ChassisNumber : "",
                            'make' => isset($motorVerificationData->Make) ? $motorVerificationData->Make : "",
                            'model' => isset($motorVerificationData->Model) ? $motorVerificationData->Model : "",
                            'modelNumber' => isset($motorVerificationData->ModelNumber) ? $motorVerificationData->ModelNumber : "",
                            'bodyType' => isset($motorVerificationData->BodyType) ? $motorVerificationData->BodyType : "",
                            'color' => isset($motorVerificationData->Color) ? $motorVerificationData->Color : "",
                            'engineNumber' => isset($motorVerificationData->EngineNumber) ? $motorVerificationData->EngineNumber : "",
                            'engineCapacity' => isset($motorVerificationData->EngineCapacity) ? $motorVerificationData->EngineCapacity : "",
                            'fuelUsed' => isset($motorVerificationData->FuelUsed) ? $motorVerificationData->FuelUsed : "",
                            'numberOfAxles' => isset($motorVerificationData->NumberOfAxles) ? $motorVerificationData->NumberOfAxles : "",
                            'axleDistance' => isset($motorVerificationData->AxleDistance) ? $motorVerificationData->AxleDistance : "",
                            'sittingCapacity' => isset($motorVerificationData->SittingCapacity) ? $motorVerificationData->SittingCapacity : "",
                            'yearOfManufacture' => isset($motorVerificationData->YearOfManufacture) ? $motorVerificationData->YearOfManufacture : "",
                            'tareWeight' => isset($motorVerificationData->TareWeight) ? $motorVerificationData->TareWeight : "",
                            'grossWeight' => isset($motorVerificationData->GrossWeight) ? $motorVerificationData->GrossWeight : "",
                            'motorUsage' => isset($motorVerificationData->MotorUsage) ? (strpos(strtolower($motorVerificationData->MotorUsage), "private") !== false ? 1 : 2) : "",
                            'ownerName' => isset($motorVerificationData->OwnerName) ? $motorVerificationData->OwnerName : "",
                            'ownerCategory' => isset($motorVerificationData->OwnerCategory) ? (strpos(strtolower($motorVerificationData->OwnerCategory), "Sole") !== false ? 1 : 2) : "",
                            'ownerAddress' =>  isset($motorVerificationData->OwnerAddress) && !(is_object($motorVerificationData->OwnerAddress) && empty((array)$motorVerificationData->OwnerAddress)) ? $motorVerificationData->OwnerAddress : "",
                        ],
                    ]);
                    DB::beginTransaction();
                    $quotation = Quotation::create($request->all());
                    if ($quotation) {
                        //Risk Coverd
                        if (isset($request['risksCovered']) && !empty($request['risksCovered'])) {
                            foreach ($request['risksCovered'] as $risksCoveredData) {
                                $risk = Risk::create([
                                    'quotation_id' => $quotation->id,
                                    'riskCode' => $risksCoveredData['riskCode'] ?? null,
                                    'sumInsured' => $risksCoveredData['sumInsured'] ?? null,
                                    'sumInsuredEquivalent' => $risksCoveredData['sumInsuredEquivalent'] ?? null,
                                    'premiumRate' => $risksCoveredData['premiumRate'] ?? null,
                                    'premiumBeforeDiscount' => $risksCoveredData['premiumBeforeDiscount'] ?? null,
                                    'premiumAfterDiscount' => $risksCoveredData['premiumAfterDiscount'] ?? null,
                                    'premiumExcludingTaxEquivalent' => $risksCoveredData['premiumExcludingTaxEquivalent'] ?? null,
                                    'premiumIncludingTax' => $risksCoveredData['premiumIncludingTax'] ?? null,
                                ]);
                                if ($risk) {
                                    //Discount Offered
                                    if (isset($risksCoveredData['discountsOffered']) && !empty($risksCoveredData['discountsOffered'])) {
                                        foreach ($risksCoveredData['discountsOffered'] as $discountsOfferedData) {
                                            if ((float)$discountsOfferedData['discountAmount'] > 0) {
                                                $riskDiscount = RiskDiscount::create([
                                                    'risk_id' => $risk->id,
                                                    'discountType' => $discountsOfferedData['discountType'] ?? null,
                                                    'discountRate' => $discountsOfferedData['discountRate'] ?? null,
                                                    'discountAmount' => $discountsOfferedData['discountAmount'] ?? null,
                                                ]);
                                            }
                                        }
                                    }
                                    if (isset($risksCoveredData['taxesCharged']) && !empty($risksCoveredData['taxesCharged'])) {
                                        foreach ($risksCoveredData['taxesCharged'] as $taxesChargedData) {
                                            if ((float)$taxesChargedData['taxAmount'] > 0) {
                                                $riskTax = RiskTax::create([
                                                    'risk_id' => $risk->id,
                                                    'taxCode' => $taxesChargedData['taxCode'] ?? null,
                                                    'isTaxExempted' => $taxesChargedData['isTaxExempted'] ?? null,
                                                    'taxExemptionType' => $taxesChargedData['taxExemptionType'] ?? null,
                                                    'taxExemptionReference' => $taxesChargedData['taxExemptionReference'] ?? null,
                                                    'taxRate' => $taxesChargedData['taxRate'] ?? null,
                                                    'taxAmount' => $taxesChargedData['taxAmount'] ?? null,
                                                ]);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ///subject Matters Covered
                        if (isset($request['subjectMattersCovered']) && !empty($request['subjectMattersCovered'])) {
                            foreach ($request['subjectMattersCovered'] as $subjectMattersCoveredData) {
                                $subjectMatter = SubjectMatter::create([
                                    'quotation_id' => $quotation->id,
                                    'subjectMatterReference' => $subjectMattersCoveredData['subjectMatterReference'] ?? null,
                                    'subjectMatterDesc' => $subjectMattersCoveredData['subjectMatterDesc'] ?? null
                                ]);
                            }
                        }
                        ///Cover Note Addons
                        if (isset($request['coverNoteAddons']) && !empty($request['coverNoteAddons'])) {
                            foreach ($request['coverNoteAddons'] as $coverNoteAddonsData) {
                                if ((float)$coverNoteAddonsData['addonAmount'] > 0) {
                                    $coverNoteAddon = CoverNoteAddon::create([
                                        'quotation_id' => $quotation->id,
                                        'addonReference' => $coverNoteAddonsData['addonReference'] ?? null,
                                        'addonDesc' => $coverNoteAddonsData['addonDesc'] ?? null,
                                        'addonAmount' => $coverNoteAddonsData['addonAmount'] ?? null,
                                        'addonPremiumRate' => $coverNoteAddonsData['addonPremiumRate'] ?? null,
                                        'premiumExcludingTax' => $coverNoteAddonsData['premiumExcludingTax'] ?? null,
                                        'premiumExcludingTaxEquivalent' => $coverNoteAddonsData['premiumExcludingTaxEquivalent'] ?? null,
                                        'premiumIncludingTax' => $coverNoteAddonsData['premiumIncludingTax'] ?? null,
                                    ]);
                                    if ($coverNoteAddon) {
                                        //taxesCharged
                                        if (isset($coverNoteAddonsData['taxesCharged']) && !empty($coverNoteAddonsData['taxesCharged'])) {
                                            foreach ($coverNoteAddonsData['taxesCharged'] as $taxesChargedData) {
                                                if ((float)$taxesChargedData['taxAmount'] > 0) {
                                                    $coverNoteAddonTax = CoverNoteAddonTax::create([
                                                        'cover_note_addon_id' => $coverNoteAddon->id,
                                                        'taxCode' => $taxesChargedData['taxCode'] ?? null,
                                                        'isTaxExempted' => $taxesChargedData['isTaxExempted'] ?? null,
                                                        'taxExemptionType' => $taxesChargedData['taxExemptionType'] ?? null,
                                                        'taxExemptionReference' => $taxesChargedData['taxExemptionReference'] ?? null,
                                                        'taxRate' => $taxesChargedData['taxRate'] ?? null,
                                                        'taxAmount' => $taxesChargedData['taxAmount'] ?? null,
                                                    ]);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        ///policy Holders
                        if ($request->has('policyHolders') && !empty($request['policyHolders'])) {
                            foreach ($request['policyHolders'] as $policyHolderData) {
                                $policyHolder = PolicyHolder::create([
                                    'quotation_id' => $quotation->id,
                                    'policyHolderName' => $policyHolderData['policyHolderName'] ?? "",
                                    'policyHolderBirthDate' => $policyHolderData['policyHolderBirthDate'] ?? "",
                                    'policyHolderType' => $policyHolderData['policyHolderType'] ?? "",
                                    'policyHolderIdNumber' => $policyHolderData['policyHolderIdNumber'] ?? "",
                                    'policyHolderIdType' => $policyHolderData['policyHolderIdType'] ?? "",
                                    'gender' => $policyHolderData['gender'] ?? "",
                                    'countryCode' => $policyHolderData['countryCode'] ?? "",
                                    'region' => $policyHolderData['region'] ?? "",
                                    'district' => $policyHolderData['district'] ?? "",
                                    'street' => $policyHolderData['street'] ?? "",
                                    'policyHolderPhoneNumber' => $policyHolderData['policyHolderPhoneNumber'] ?? "",
                                    'policyHolderFax' => $policyHolderData['policyHolderFax'] ?? "",
                                    'postalAddress' => $policyHolderData['postalAddress'] ?? "",
                                    'emailAddress' =>  $policyHolderData['emailAddress'] ?? "",
                                ]);
                            }
                        }
                        //Motor Details
                        $motorDtl = MotorDetail::create([
                            'quotation_id' => $quotation->id,
                            'motorCategory' => $request['motorDtl']['motorCategory'] ?? null,
                            'motorType' => $request['motorDtl']['motorType'] ?? null,
                            'registrationNumber' => $request['motorDtl']['registrationNumber'] ?? null,
                            'chassisNumber' => $request['motorDtl']['chassisNumber'] ?? null,
                            'make' => $request['motorDtl']['make'] ?? null,
                            'model' => $request['motorDtl']['model'] ?? null,
                            'modelNumber' => $request['motorDtl']['modelNumber'] ?? null,
                            'bodyType' => $request['motorDtl']['bodyType'] ?? null,
                            'color' => $request['motorDtl']['color'] ?? null,
                            'engineNumber' => $request['motorDtl']['engineNumber'] ?? null,
                            'engineCapacity' => $request['motorDtl']['engineCapacity'] ?? null,
                            'fuelUsed' => $request['motorDtl']['fuelUsed'] ?? null,
                            'numberOfAxles' => $request['motorDtl']['numberOfAxles'] ?? null,
                            'axleDistance' => $request['motorDtl']['axleDistance'] ?? null,
                            'sittingCapacity' => $request['motorDtl']['sittingCapacity'] ?? null,
                            'yearOfManufacture' => $request['motorDtl']['yearOfManufacture'] ?? null,
                            'tareWeight' => $request['motorDtl']['tareWeight'] ?? null,
                            'grossWeight' => $request['motorDtl']['grossWeight'] ?? null,
                            'motorUsage' => $request['motorDtl']['motorUsage'] ?? null,
                            'ownerName' => $request['motorDtl']['ownerName'] ?? null,
                            'ownerCategory' => $request['motorDtl']['ownerCategory'] ?? null,
                            'ownerAddress' => $request['motorDtl']['ownerAddress'] ?? null,
                        ]);
                        $ussd_request->update([
                            'quotationRequestId' => $quotation->requestId
                        ]);
                        DB::commit();
                        $motorCoverNoteRefRequest = Tiramis::motorCoverNoteRefRequest($request);
                        return ['status_code' => Response::HTTP_OK, 'message' =>  'Done', 'data' => null];
                    } else {
                        DB::rollBack();
                        $msg = trans('menu.connection_error');
                        return ['status_code' => Response::HTTP_BAD_REQUEST, 'message' =>  $msg, 'data' => null];
                    }
                } else {
                    $msg = trans('menu.connection_error');
                    return ['status_code' => Response::HTTP_BAD_REQUEST, 'message' =>  $msg, 'data' => null];
                }
            } else {
                $msg = trans('menu.connection_error');
                return ['status_code' => Response::HTTP_BAD_REQUEST, 'message' =>  $msg, 'data' => null];
            }
            return  $coverNoteVerificationResponse;
        } else {
            $msg = trans('menu.connection_error');
            return ['status_code' => Response::HTTP_BAD_REQUEST, 'message' =>  $msg, 'data' => null];
        }
    }
    public function cover_note_verification()
    {
        return view('admin.cover-note-verification');
    }
    public function cover_note_verification_store(Request $request)
    {
        $verification = new CoverNoteController();
        $verification = $verification->coverNoteVerification($request);
        $response = $verification->getData();
        $message = $response->message;
        $data = $response->data;
        $code = $verification->getStatusCode();
        if ($code == Response::HTTP_OK) {
            $currentDateTime = Carbon::now();
            $coverNoteEndDate = Carbon::parse($data->CoverNoteEndDate);
            if ($coverNoteEndDate->gt($currentDateTime)) {
                //Active Cover
                $status = 'ACTIVE';
                $status_code =  Response::HTTP_NOT_ACCEPTABLE;
            } else {
                //InActive Cover
                $status = 'INACTIVE';
                $status_code =  Response::HTTP_ACCEPTED;
            }
            $data = [
                "status" => $status,
                "coverNoteNumber" => $data->CoverNoteNumber,
                "coverNoteIssueDate" => $data->CoverNoteIssueDate,
                "coverNoteStartDate" => $data->CoverNoteStartDate,
                "coverNoteEndDate" => $data->CoverNoteEndDate,
                "insurerCompanyName" => $data->InsurerCompanyName,
                "transactionCompanyName" => $data->TransactionCompanyName,
                "totalPremiumIncludingTax" => $data->TotalPremiumIncludingTax,
                "productCode" => $data->ProductCode,
                "registrationNumber" => $data->MotorDtl->RegistrationNumber,
                "chassisNumber" => $data->MotorDtl->ChassisNumber,
                "make" => $data->MotorDtl->Make,
                "model" => $data->MotorDtl->Model,
                "bodyType" => $data->MotorDtl->BodyType,
                "color" => $data->MotorDtl->Color,
            ];
            return ['status_code' =>  $status_code, 'message' =>  $message, 'data' => $data];
        } else {
            return response()->json(['message' =>  $message, 'data' => null], Response::HTTP_BAD_REQUEST);
        }
    }
    public function profile()
    {
        return view('admin.profile');
    }
    public function profile_store(Request $request)
    {
        $id = auth()->user()->id;
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
        ]);
        $user = User::where('id', $id)->first();
        if ($user) {
            $user->update([
                'first_name' => $request->input('first_name'),
                'middle_name' => $request->input('middle_name'),
                'last_name' => $request->input('last_name'),
                'title' => $request->input('title'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
            ]);
            return redirect()->back()->with('success', 'User updated successful');
        }
        return redirect()->back()->with('error', 'User not found');
    }
    public function profile_change_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $id = auth()->user()->id;
        $user  = User::where('id', $id)->first();
        $hashedPassword = $user->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            if (Hash::check($request->current_password, $hashedPassword)) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                return redirect()->back()->with('success', 'Password successfully changed!');
            } else {
                return redirect()->back()->with('warning', 'new password can not be the old password!');
            }
        } else {
            return redirect()->back()->with('error', 'old password doesnt matched');
        }
    }
}

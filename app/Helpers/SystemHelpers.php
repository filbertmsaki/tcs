<?php

use App\Enums\CalculationTypeEnum;
use App\Enums\RiskTypeEnum;
use App\Models\ClaimNotification;
use App\Models\Quotation;
use App\Models\SubjectMatter;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Carbon\Carbon;

if (!function_exists('dateFormat')) {
    function dateFormat($date, $f = 'd/m/Y')
    {
        return (new Carbon($date))->format($f);
    }
}
if (!function_exists('formatMoney')) {
    function formatMoney($amount, $currencySymbol = 'TZS')
    {
        $formattedAmount = number_format($amount, 2, '.', ',');

        return $currencySymbol . ' ' . $formattedAmount;
    }
}
if (!function_exists('generateRandomUniqueNumber')) {
    function generateRandomUniqueNumber($modelClass, $columnName)
    {
        do {
            // Generate a random unique number
            $random1 = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $random2 = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $random = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $randomUniqueNumber =  $random  . '-' .  $random1  . '-' .  $random2;
            // Check if the generated number already exists in the database
            $exists = $modelClass::where($columnName, $randomUniqueNumber)->exists();
        } while ($exists);
        return $randomUniqueNumber;
    }
}
if (!function_exists('request_id')) {
    function request_id($modelName, $prefix)
    {
        $request_id = 0;
        $prefix = $prefix . date('dm');
        $lastOrder = $modelName::orderBy('created_at', 'DESC')->first();
        if ($lastOrder) {
            $request_id = substr($lastOrder->requestId, strlen($prefix));
            if (!is_numeric($request_id)) {
                $request_id = 0;
            }
        }
        $request_id = (int)$request_id + 1;
        $len = max(4, strlen((string)$request_id));
        $paddedOrderNo = str_pad($request_id, $len, '0', STR_PAD_LEFT);
        $newOrderNo = $prefix . $paddedOrderNo;
        while ($modelName::where('requestId', $newOrderNo)->exists()) {
            $exitId = (int)substr($newOrderNo, strlen($prefix)) + 1;
            $newLen = max(4, strlen((string)$exitId));
            $paddedExitId = str_pad($exitId, $newLen, '0', STR_PAD_LEFT);
            $newOrderNo = $prefix . $paddedExitId;
        }
        return $newOrderNo;
    }
}

if (!function_exists('fleetId')) {
    function fleetId($modelName, $prefix)
    {
        $fleetId = 0;
        $prefix = $prefix . '-' . date('d-m') . "-";
        $lastOrder = $modelName::orderBy('created_at', 'DESC')->first();
        if ($lastOrder) {
            $fleetId = substr($lastOrder->fleetId, strlen($prefix));
        }
        $fleetId = $fleetId + 1;
        $len = max(4, strlen($fleetId));
        $paddedOrderNo = str_pad($fleetId, $len, '0', STR_PAD_LEFT);
        $newOrderNo = $prefix . $paddedOrderNo;
        while ($modelName::where('fleetId', $newOrderNo)->exists()) {
            $exitId = substr($newOrderNo, strlen($prefix)) + 1;
            $newLen = max(4, strlen($exitId));
            $paddedExitId = str_pad($exitId, $newLen, '0', STR_PAD_LEFT);
            $newOrderNo = $prefix . $paddedExitId;
        }
        return $newOrderNo;
    }
}
if (!function_exists('remove_special_characters')) {
    function  remove_special_characters($string)
    {
        return strtoupper(preg_replace('/[^A-Za-z0-9]/', '', trim($string)));
    }
}
if (!function_exists('cover_note_request_id')) {
    function cover_note_request_id()
    {
        $request_id = 0;
        $prefix = 'AICCNRR' . date('dm');
        $lastOrder = Quotation::orderBy('created_at', 'DESC')->first();
        if ($lastOrder) {
            $request_id = substr($lastOrder->requestId, strlen($prefix));
        }
        $request_id = $request_id + 1;
        $len = max(4, strlen($request_id));
        $paddedOrderNo = str_pad($request_id, $len, '0', STR_PAD_LEFT);
        $newOrderNo = $prefix . $paddedOrderNo;
        while (Quotation::where('requestId', $newOrderNo)->exists()) {
            $exitId = substr($newOrderNo, strlen($prefix)) + 1;
            $newLen = max(4, strlen($exitId));
            $paddedExitId = str_pad($exitId, $newLen, '0', STR_PAD_LEFT);
            $newOrderNo = $prefix . $paddedExitId;
        }
        return $newOrderNo;
    }
}
if (!function_exists('subject_matter_reference')) {
    function subject_matter_reference()
    {
        $subjectMatterReference = 0;
        $prefix = 'SMR' . date('dmy');
        $lastOrder = SubjectMatter::orderBy('created_at', 'DESC')->first();
        if ($lastOrder) {
            $referenceSuffix = substr($lastOrder->subjectMatterReference, strlen($prefix));
            if ($referenceSuffix === '' || $referenceSuffix === null) {
                $subjectMatterReference = 0;
            } else {
                $subjectMatterReference = intval($referenceSuffix);
            }
        }
        $subjectMatterReference = $subjectMatterReference + 1;
        $len = max(4, strlen($subjectMatterReference));
        $paddedOrderNo = str_pad($subjectMatterReference, $len, '0', STR_PAD_LEFT);
        $newOrderNo = $prefix . $paddedOrderNo;
        while (SubjectMatter::where('subjectMatterReference', $newOrderNo)->exists()) {
            $exitId = substr($newOrderNo, strlen($prefix)) + 1;
            $newLen = max(4, strlen($exitId));
            $paddedExitId = str_pad($exitId, $newLen, '0', STR_PAD_LEFT);
            $newOrderNo = $prefix . $paddedExitId;
        }
        return $newOrderNo;
    }
}


if (!function_exists('cover_note_number')) {
    function cover_note_number()
    {
        $number = 0;
        $prefix = 'CN' . date('dm');
        $lastOrder = Quotation::orderBy('created_at', 'DESC')->first();
        if ($lastOrder) {
            $number = substr($lastOrder->coverNoteNumber, strlen($prefix));
        }
        $number = $number + 1;
        $len = max(4, strlen($number));
        $paddedOrderNo = str_pad($number, $len, '0', STR_PAD_LEFT);
        $newOrderNo = $prefix . $paddedOrderNo;
        while (Quotation::where('coverNoteNumber', $newOrderNo)->exists()) {
            $exitId = substr($newOrderNo, strlen($prefix)) + 1;
            $newLen = max(4, strlen($exitId));
            $paddedExitId = str_pad($exitId, $newLen, '0', STR_PAD_LEFT);
            $newOrderNo = $prefix . $paddedExitId;
        }
        return $newOrderNo;
    }
}
if (!function_exists('claim_notification_request_id')) {
    function claim_notification_request_id()
    {
        $number = 0;
        $prefix = 'CNN' . date('dm');
        $lastOrder = ClaimNotification::orderBy('created_at', 'DESC')->first();
        if ($lastOrder) {
            $number = substr($lastOrder->requestId, strlen($prefix));
        }
        $number = $number + 1;
        $len = max(4, strlen($number));
        $paddedOrderNo = str_pad($number, $len, '0', STR_PAD_LEFT);
        $newOrderNo = $prefix . $paddedOrderNo;
        while (ClaimNotification::where('requestId', $newOrderNo)->exists()) {
            $exitId = substr($newOrderNo, strlen($prefix)) + 1;
            $newLen = max(4, strlen($exitId));
            $paddedExitId = str_pad($exitId, $newLen, '0', STR_PAD_LEFT);
            $newOrderNo = $prefix . $paddedExitId;
        }
        return $newOrderNo;
    }
}
if (!function_exists('claim_notification_number')) {
    function claim_notification_number()
    {
        $number = 0;
        $prefix = 'CNN0' . date('dm');
        $lastOrder = ClaimNotification::orderBy('created_at', 'DESC')->first();
        if ($lastOrder) {
            $number = substr($lastOrder->claimNotificationNumber, strlen($prefix));
        }
        $number = $number + 1;
        $len = max(4, strlen($number));
        $paddedOrderNo = str_pad($number, $len, '0', STR_PAD_LEFT);
        $newOrderNo = $prefix . $paddedOrderNo;
        while (ClaimNotification::where('claimNotificationNumber', $newOrderNo)->exists()) {
            $exitId = substr($newOrderNo, strlen($prefix)) + 1;
            $newLen = max(4, strlen($exitId));
            $paddedExitId = str_pad($exitId, $newLen, '0', STR_PAD_LEFT);
            $newOrderNo = $prefix . $paddedExitId;
        }
        return $newOrderNo;
    }
}
if (!function_exists('random_color')) {
    function random_color()
    {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }
}
if (!function_exists('region_excel_to_array')) {
    function region_excel_to_array($filePath)
    {
        $objReader = IOFactory::createReaderForFile($filePath);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($filePath);
        $objWorksheet = $objPHPExcel->getActiveSheet();

        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();

        $data = [];
        $currentRegionCode = '';
        $currentRegionName = '';
        $currentDistricts = [];

        for ($row = 2; $row <= $highestRow; $row++) {
            $regionCode = $objWorksheet->getCell('A' . $row)->getValue();
            $regionName = $objWorksheet->getCell('B' . $row)->getValue();
            $districtCode = $objWorksheet->getCell('C' . $row)->getValue();
            $districtName = $objWorksheet->getCell('D' . $row)->getValue();

            // Check if the region code cell is empty
            if ($regionCode != '') {
                // If not empty, update current region and add previous data to result array
                if (!empty($currentRegionCode)) {
                    $data[] = [
                        'region_code' => $currentRegionCode,
                        'region_name' => $currentRegionName,
                        'districts' => $currentDistricts,
                    ];
                }
                // Update current region code and region name, and reset current districts
                $currentRegionCode = $regionCode;
                $currentRegionName = $regionName;
                $currentDistricts = [];
            }

            // Add district and district2 to current districts
            $currentDistricts[] = [
                'district_code' => $districtCode,
                'district_name' => $districtName,
            ];
        }

        // Add last region to result array
        if (!empty($currentRegionCode)) {
            $data[] = [
                'region_code' => $currentRegionCode,
                'region_name' => $currentRegionName,
                'districts' => $currentDistricts,
            ];
        }

        return $data;
    }
}

if (!function_exists('excel_to_array')) {
    function excel_to_array($filePath, $header = true)
    {
        $objReader = IOFactory::createReaderForFile($filePath);

        // Set read type to read cell data only
        $objReader->setReadDataOnly(true);

        // Load $inputFileName to a PHPExcel Object
        $objPHPExcel = $objReader->load($filePath);

        // Get worksheet and build array with first row as header
        $objWorksheet = $objPHPExcel->getActiveSheet();

        // Excel with first row header, use header as key
        if ($header) {
            $highestRow = $objWorksheet->getHighestRow();
            $highestColumn = $objWorksheet->getHighestColumn();
            $headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
            $headingsArray = $headingsArray[1];

            $namedDataArray = [];
            for ($row = 2; $row <= $highestRow; ++$row) {
                $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
                if (isset($dataRow[$row]['A']) && $dataRow[$row]['A'] > '') {
                    $rowData = [];
                    foreach ($headingsArray as $columnKey => $columnHeading) {
                        $rowData[$columnHeading] = $dataRow[$row][$columnKey];
                    }
                    $namedDataArray[] = $rowData;
                }
            }
        } else {
            // Excel sheet with no header
            $namedDataArray = $objWorksheet->toArray(null, true, true, true);
        }

        return $namedDataArray;
    }
}


if (!function_exists('extract_percentage')) {
    function  extract_percentage($string)
    {
        $pattern = '/\d+(?:\.\d+)?%/'; // Matches numbers with optional decimal points followed by '%'
        preg_match($pattern, $string, $matches);
        if (!empty($matches)) {
            $percentage = $matches[0]; // Extracted percentage
            // Remove '%' sign and any other unwanted characters
            $percentage = str_replace('%', '', $percentage);
            // Convert percentage to float
            $percentage = (float) $percentage;
            return $percentage / 100;
        } else {
            return 0;
        }
    }
}


if (!function_exists('extract_with_tpp')) {
    function extract_with_tpp($string)
    {
        // Matches numbers with optional decimal points followed by '%' and 'TPP'
        $pattern = '/\d+(?:\.\d+)?%.*TPP/i';
        preg_match($pattern, $string, $matches);
        if (!empty($matches)) {
            $percentage_with_tpp = $matches[0]; // Extracted percentage with TPP
            // Remove 'TPP' and any other unwanted characters
            $percentage_with_tpp = str_ireplace('TPP', '', $percentage_with_tpp);
            // Remove '%' sign and any other unwanted characters
            $percentage_with_tpp = preg_replace('/[^0-9.]/', '', $percentage_with_tpp);
            // Convert percentage to float
            $percentage = (float) $percentage_with_tpp;
            return 1;
        } else {
            return 0;
        }
    }
}



if (!function_exists('clear')) {
    function  clear($string)
    {
        return strtoupper(preg_replace('/[^A-Za-z0-9]/', '', trim($string)));
    }
}
if (!function_exists('isMergedCell')) {
    function  isMergedCell($worksheet, $column, $row)
    {
        $mergedCells = $worksheet->getMergeCells();
        foreach ($mergedCells as $mergedCell) {
            if ($worksheet->isRangePartOfMerge($mergedCell, $column . $row)) {
                return true;
            }
        }
        return false;
    }
}
if (!function_exists('extractPercentageAndAmount')) {
    function extractPercentageAndAmount($string)
    {
        // Trim white spaces
        $string = trim($string);

        // Initialize variables
        $percentage = 0;
        $additionalAmount = 0;
        $perSeat = 0;
        $seatPrice = 0;
        $tpp = 0;

        // Extract percentage
        preg_match('/(\d+(\.\d+)?)%/', $string, $matches);
        if (!empty($matches)) {
            $percentage = floatval($matches[1]);
        }

        // Extract additional amount if it follows a currency format
        preg_match('/\+(\D+)?(\d[\d,]*)/', $string, $matches);
        if (!empty($matches)) {
            $additionalAmount = intval(str_replace(',', '', $matches[2]));
        }

        // Check for "per seat"
        if (strpos($string, 'per seat') !== false) {
            $perSeat = 1;

            // Extract seat price if available
            preg_match('/(\d[\d,]*) per seat/', $string, $matches);
            if (!empty($matches)) {
                $seatPrice = intval(str_replace(',', '', $matches[1]));
            }
        }

        // Check for "TPP"
        if (strpos($string, 'TPP') !== false) {
            $tpp = 1;
        }

        return array(
            'percentage' => $percentage,
            'additionalAmount' => $additionalAmount,
            'perSeat' => $perSeat,
            'seatPrice' => $seatPrice,
            'tpp' => $tpp
        );
    }
}


if (!function_exists('product_risk_array')) {
    function product_risk_array($filePath, $header = true)
    {

        $objReader = IOFactory::createReaderForFile($filePath);
        $objReader->setReadDataOnly(true);
        $objPHPExcel = $objReader->load($filePath);

        $data = [];

        // Iterate over each sheet
        foreach ($objPHPExcel->getAllSheets() as $objWorksheet) {
            $currentProductCode = '';
            $currentProductName = '';
            $currentDetails = [];

            $highestRow = $objWorksheet->getHighestRow();
            $highestColumn = $objWorksheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
                $productCode = $objWorksheet->getCell('B' . $row)->getValue();
                $productName = $objWorksheet->getCell('C' . $row)->getValue();
                $risk_code = $objWorksheet->getCell('D' . $row)->getValue();
                $risk_name = $objWorksheet->getCell('E' . $row)->getValue();
                $risk_percentage = trim($objWorksheet->getCell('F' . $row)->getValue());
                $minimum_amount = $objWorksheet->getCell('G' . $row)->getValue();
                $sheet_name = $objWorksheet->getTitle();

                if ($sheet_name == "MOTOR") {
                    // Check if the product code cell is part of a merged range
                    if (isMergedCell($objWorksheet, 'B', $row)) {
                        // If part of merged range, fetch the value from the top-left cell of the range
                        $productCode = $objWorksheet->getCellByColumnAndRow('B', $row)->getValue();
                    }

                    // Check if the product name cell is part of a merged range
                    if (isMergedCell($objWorksheet, 'C', $row)) {
                        // If part of merged range, fetch the value from the top-left cell of the range
                        $productName = $objWorksheet->getCellByColumnAndRow('C', $row)->getValue();
                    }

                    // Check if the product code cell is empty
                    if ($productCode != '') {
                        // If not empty, update current product and add previous data to result array
                        if (!empty($currentProductCode)) {
                            $data[$objWorksheet->getTitle()][] = [
                                'product_code' => $currentProductCode,
                                'product_name' => $currentProductName,
                                'risks' => $currentDetails,
                            ];
                        }
                        // Update current product code and product name, and reset current details
                        $currentProductCode = $productCode;
                        $currentProductName = $productName;
                        $currentDetails = [];
                    }


                    $risk_data = extractPercentageAndAmount($risk_percentage);
                    $percentage = floatval($risk_data['percentage']);
                    $additional_amount = $risk_data['additionalAmount'];
                    $perSeat = $risk_data['perSeat'];
                    $seatPrice = $risk_data['seatPrice'];
                    $tpp = $risk_data['tpp'];

                    if ($percentage > 0) {
                        $risk_type = RiskTypeEnum::Comprehensive->value;
                        $premium_rate = $percentage;
                    } else {
                        $risk_type = RiskTypeEnum::ThirdPart->value;
                        $premium_rate = 0;
                    }
                    if ($perSeat) {
                        $calculation_type = CalculationTypeEnum::PerSeat->value;
                    } else {
                        $calculation_type = CalculationTypeEnum::Normal->value;
                    }

                    if ($tpp) {
                        $additional_amount = $minimum_amount;
                    }

                    $currentDetails[] = [
                        'risk_code' => $risk_code,
                        'risk_name' => $risk_name,
                        'risk_type' => $risk_type,
                        'premium_rate' => $premium_rate,
                        'risk_percentage' => $risk_percentage,
                        'minimum_amount' => $minimum_amount,
                        'calculation_type' => $calculation_type,
                        'additional_amount' => $additional_amount,
                        'seat_price' =>  $seatPrice,
                    ];
                }
            }

            // Add last product to result array
            if (!empty($currentProductCode)) {
                $data[$objWorksheet->getTitle()][] = [
                    'product_code' => $currentProductCode,
                    'product_name' => $currentProductName,
                    'risks' => $currentDetails,
                ];
            }
        }

        return $data;
    }
}

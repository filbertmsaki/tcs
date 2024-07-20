<?php

namespace Database\Seeders;

use App\Enums\CalculationTypeEnum;
use App\Enums\SystemStatusEnum;
use App\Models\Country;
use App\Models\CoverCategory;
use App\Models\CoverProduct;
use App\Models\CoverRisk;
use App\Models\Currency;
use App\Models\District;
use App\Models\Region;
use App\Models\Tax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productFilePath = public_path('tira-data/TEST_DATA_FOR_UAT_PRODUCTS_and_RISKS.xlsx');
        if (!file_exists($productFilePath)) {
            $this->command->error('Seeder error: ',  'Excel file not found.');
        }
        $cover_products =  product_risk_array($productFilePath);
        foreach ($cover_products as $categry => $products) {
            $cover_category = $categry;
            $c_category = CoverCategory::updateOrCreate(['name' => trim($cover_category)]);
            foreach ($products as $product) {
                $product_code = $product['product_code'];
                $product_name = ucwords(strtolower(trim($product['product_name'])));
                $risks = $product['risks'];
                $productModel = CoverProduct::updateOrCreate(
                    ['product_code' => $product_code],
                    ['product_name' => $product_name, 'cover_category_id' => $c_category->id]
                );
                if ($productModel) {
                    foreach ($risks as $risk) {
                        $risk_code = $risk['risk_code'];
                        $risk_name =  ucwords(strtolower(trim($risk['risk_name'])));
                        $premium_rate = $risk['premium_rate'];
                        $minimum_amount = $risk['minimum_amount'];
                        $risk_type = $risk['risk_type'];
                        $calculation_type = $risk['calculation_type'];
                        $additional_amount = $risk['additional_amount'];
                        $seat_price = $risk['seat_price'];
                        if ($calculation_type == CalculationTypeEnum::PerSeat->value) {
                            $price =  $seat_price;
                        } else {
                            $price =  $minimum_amount;
                        }
                        if (!empty($risk_code) && !empty($risk_name)) {
                            CoverRisk::updateOrCreate(
                                [
                                    'risk_code' => $risk_code,
                                ],
                                [
                                    'product_id' => $productModel->id,
                                    'risk_name' => $risk_name,
                                    'premium_rate' => $premium_rate,
                                    'calculation_type' => $calculation_type,
                                    'minimum_amount' => $minimum_amount,
                                    'additional_amount' => $additional_amount,
                                    'price' => $price,
                                    'risk_type' => $risk_type
                                ]
                            );
                        }
                    }
                }
            }
        }
        $this->command->info("Cover product and risk done");
        $currencyFilePath = public_path('tira-data/CURRENCIES.xlsx');
        if (!file_exists($currencyFilePath)) {
            $this->command->error('Seeder error: ',   'Excel file not found.');
        }
        $currencies = excel_to_array($currencyFilePath);
        foreach ($currencies as $currency) {
            $cur = Currency::updateOrCreate(['code' => $currency['CODE']], ['name' => $currency['CURRENCY']]);
        }
        $this->command->info("Currency done");
        $countryFilePath = public_path('tira-data/Countries.xlsx');
        if (!file_exists($countryFilePath)) {
            $this->command->error('Seeder error: ',   'Country Excel file not found.');
        }
        $countries = excel_to_array($countryFilePath);
        foreach ($countries as $country) {
            $cur = Country::updateOrCreate(['code' => trim($country['CODE'])], ['name' => trim($country['COUNTRY'])]);
        }
        $this->command->info("Country done");
        $regionFilePath = public_path('tira-data/RegionsandRespectiveDistricts.xlsx');
        if (!file_exists($regionFilePath)) {
            $this->command->error('Seeder error: ',   'Excel file not found.');
        }
        $regionsData = region_excel_to_array($regionFilePath);
        foreach ($regionsData as $region) {
            $reg = Region::updateOrCreate(['code' => trim($region['region_code'])], ['name' => trim($region['region_name'])]);
            if ($reg) {
                foreach ($region['districts'] as $district) {
                    $dis = District::updateOrCreate(['code' => trim($district['district_code'])], ['name' => trim($district['district_name']), 'region_id' => $reg->id]);
                }
            }
        }
        $this->command->info("Region and district done");

        $taxes = [
            [
                'rate' => 18,
                'code' => "VAT MAINLAND",
                'status' => SystemStatusEnum::Active->value,
            ],
            [
                'rate' => 5,
                'code' => "WITHHOLDING",
                'status' => SystemStatusEnum::Active->value,
            ]

        ];

        foreach ($taxes  as $tax_item) {
            Tax::updateOrCreate(
                [
                    'code' => $tax_item['code']
                ],
                [
                    'rate' => $tax_item['rate'],
                    'status' => $tax_item['status'],

                ]
            );
        }
        $this->command->info("Taxes done");
    }
}

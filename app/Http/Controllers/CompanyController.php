<?php

namespace App\Http\Controllers;

use App\Events\CompanyFormSubmitted;
use App\Http\Requests\CompanyRequest;
use App\Services\HttpApiService;
use App\Services\MailNotificationService;

class CompanyController extends Controller
{
    public function sendForm(CompanyRequest $request)
    {
        // step I - validate the data
        $validated = $request->validated();

        if ($validated) {
            // step II
            // make first call to the API to get company name
            $params['url'] = 'https://pkgstore.datahub.io/core/nasdaq-listings/nasdaq-listed_json/data/a5bc7580d6176d60ac0b2142ca8d7df6/nasdaq-listed_json.json';
            $apiService = new HttpApiService($params);
            $apiService->sendRequest();
            $requestedData1 = $apiService->getRequestedData();
            $company_name = $requestedData1->where('Symbol', $validated['symbol'])->pluck('Company Name')->first();

            if ($company_name) {
                // step III send a notification
                $notifier = new MailNotificationService([
                    'company_symbol' => $validated['symbol'],
                    'start_date' => $validated['start_date'],
                    'end_date' => $validated['end_date'],
                    'email' => $validated['email'],
                    'company_name' => $company_name,
                ]);
                CompanyFormSubmitted::dispatch($notifier);
            }

            // step IV
            // make second call to the API to get the prices for drawing chart and outputing data to the table
            $params = [
                'url' => 'https://yh-finance.p.rapidapi.com/stock/v3/get-historical-data',
                'query' => [
                    'symbol' => $validated['symbol'],
                    'region' => 'US'
                ]
            ];
            $headers = [
                'X-RapidAPI-Key' => env('RAPID_API_SERVICE_KEY')
            ];
            $apiService = new HttpApiService($params, $headers);
            $apiService->sendRequest();
            $requestedData2 = $apiService->getRequestedData('prices');

            if ($requestedData2->count() && $company_name) {
                $requestedData2 = $requestedData2->whereBetween('date', [strtotime($validated['start_date']), strtotime($validated['end_date'])])
                    ->filter(function ($item) {
                        return !isset($item['type'], $item['splitRatio'], $item['denominator'], $item['numerator'], $item['data']);
                    });
                $data = [
                    'company' => [
                        'symbol' => $validated['symbol'],
                        'name' => $company_name
                    ],
                    'prices' => $requestedData2,
                    'charts' => [
                        'openData' => $requestedData2->pluck('open'),
                        'closeData' => $requestedData2->pluck('close'),
                        'labels' => $requestedData2->map(fn($item) => date('Y-m-d', $item['date'])),
                    ]
                ];
                return view('entities.company.show', compact('data'));
            }

            return view('entities.company.404');
        }
    }
}

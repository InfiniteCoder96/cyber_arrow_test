<?php

namespace App\Repositories;

use App\Interfaces\StocksInterface;
use App\Traits\ResponseAPI;
use App\Models\Stock;
use Illuminate\Support\Facades\Http;

const API_SLUG = "stocks";
class StocksRepository implements StocksInterface
{
    use ResponseAPI;

    public function get_stocks_by_date($date)
    {
        try {
            $api_url = env('BASE_URL') . API_SLUG;
            $response = Http::get($api_url, [
                'date' => $date
            ]);

            $stock_data = $response->json($key = "data")[0];

            $stock = new Stock();
            $stock->open_value = $stock_data["open"];
            $stock->high_value = $stock_data["high"];
            $stock->low_value = $stock_data["low"];
            $stock->close_value = $stock_data["close"];

            if ($response->successful()) return $this->successResponse($stock->serialize());
            else if ($response->failed()) return $this->errorResponse(400);

        } catch (\Exception $e) {
            return $this->errorResponse();
        }
    }
}

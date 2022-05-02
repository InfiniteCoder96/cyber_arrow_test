<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Interfaces\StocksInterface;

class StocksController extends Controller {

    protected $stocksInterface;

    public function __construct(StocksInterface $stocksInterface)
    {
        $this->stocksInterface = $stocksInterface;
    }

    /**
     * Get stock by date
     */
    public function get_stocks_by_date(Request $request) {
        $date = $request->input('date');
        return $this->stocksInterface->get_stocks_by_date($date);
    }
}
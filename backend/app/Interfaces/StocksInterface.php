<?php

namespace App\Interfaces;

interface StocksInterface
{

    /**
     * Get Stocks By date
     * 
     * @param   string     $date
     * 
     * @access  public
     */
    public function get_stocks_by_date($date);

}
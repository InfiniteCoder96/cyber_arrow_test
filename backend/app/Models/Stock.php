<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = array('open_value', 'high_value', 'low_value', 'close_value');

    public function serialize()
    {
        $obj['open_value'] = $this->open_value;
        $obj['high_value'] = $this->high_value;
        $obj['low_value'] = $this->low_value;
        $obj['close_value'] = $this->close_value;

        return $obj;
    }
}
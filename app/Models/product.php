<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'type',
        'capital_price',
        'sell_price',
        'stock_last',
    ];
    
    public function detail() {
        return $this->belongsTo(Detail::class);
    }
    
}

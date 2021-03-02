<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table='account';
    protected $primary = 'id';

    public function transaction()
    {
        return $this->belongsTo(Transactions::class);
    }
}

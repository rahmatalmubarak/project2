<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';

    protected $guarded = [];
    

    public function account() {
        return $this->hasOne(Account::class, 'account_id');
    }

    public function detail() {
        return $this->belongsTo(Detail::class);
    }
}

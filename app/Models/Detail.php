<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'detail';

    protected $guarded = ['transaction_id'];

    public function transaction() {
        return $this->hasOne(Transaction::class, 'transaction_id');
    }
    public function product() {
        return $this->hasOne(product::class);
    }
}

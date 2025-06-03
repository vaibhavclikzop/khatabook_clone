<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $fillable = [
        "user_id",
        "customer_id",
        "amount",
        "ref_id",
        "type",
        "description",	
        "file",	
        "payment_mode",
        "transaction_date"
    ];

     public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

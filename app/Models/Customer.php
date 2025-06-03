<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
       

"name",
"number",
"email",
"type",
"gst",
"address",
"state",
"city1",
"pincode",
"active",
"dob",
"pan_card",
"adhar_card",
"so_wo",
"city",
"rating",
"project",
"unit_no",

    ];
}

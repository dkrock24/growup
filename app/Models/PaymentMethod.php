<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'method',
        'status',
        'api1',
        'api2',
        'api3',
        'api4',
        'api5',
    ];
}

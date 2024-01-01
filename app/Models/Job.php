<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * STATUS
     * 0 = Pending
     * 1 = Completed
     * 2 = Waiting
     */

    protected $fillable = [
        'service',
        'address',
        'phone',
        'deadline',
        'status',
        'admin_notes',
        'customer_notes',
        'amount',
        'fees',
        'total',
        'is_paid',
        'payment_id',
        'payment_file',
        'customer',
        'p_method',
    ];

    public static function jobStatus() {
        return array(
            'Pending', 'On going', 'Completed', 'Canceled'
        );
    }

    public function user() 
    {
        return $this->belongsTo(User::class, 'customer');
    }

    public function serviceType() 
    {
        return $this->belongsTo(Catalog::class, 'service');
    }

    public function paymentType() 
    {
        return $this->belongsTo(PaymentMethod::class, 'p_method');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'job',
        'emp'
    ];

    public function employee() 
    {
        return $this->belongsTo(Employee::class, 'emp');
    }

    public function job() 
    {
        return $this->belongsTo(JOb::class, 'job');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestDrive extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'preferred_date',
        'preferred_time',
        'status',
        'notes',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
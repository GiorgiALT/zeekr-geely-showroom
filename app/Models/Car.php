<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'price',
        'color',
        'mileage',
        'fuel_type',
        'transmission',
        'description',
        'main_image',
        'gallery_images',
        'status',
        'is_featured',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
    ];

    public function testDrives()
    {
        return $this->hasMany(TestDrive::class);
    }

    public function getFormattedPriceAttribute()
    {
        return '₾' . number_format($this->price, 0);
    }
}
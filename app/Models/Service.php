<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'category', 'description', 'price', 'slug'
    ];

    public function galleries()
    {
        return $this->hasMany(ServiceGallery::class,'services_id');
    }

    public function reviews()
    {
        return $this->hasMany(ServiceReview::class,'services_id');
    }
}

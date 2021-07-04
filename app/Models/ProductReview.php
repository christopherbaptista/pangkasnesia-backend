<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductReview extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'products_id', 'star', 'comments'
    ];

    protected $hidden = [
        
    ];

    public function product() {
        return $this->belongsTo(Product::class,'products_id','id');
    }
}

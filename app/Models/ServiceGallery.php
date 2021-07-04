<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceGallery extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'services_id', 'photo', 'is_default'
    ];

    protected $hidden = [
        
    ];

    public function service() {
        return $this->belongsTo(Service::class,'services_id','id');
    }

    public function getPhotoAttribute($value) {
        return url('storage/' . $value);
    }
}

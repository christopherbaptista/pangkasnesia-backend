<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceReview extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'services_id', 'star', 'comments'
    ];

    protected $hidden = [
        
    ];

    public function service() {
        return $this->belongsTo(Service::class,'services_id','id');
    }
}

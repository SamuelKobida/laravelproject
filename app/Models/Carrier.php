<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'eshop_id',
        'created_at',
        'updated_at'
    ];

    public function eshop(){
        return $this->belongsTo('App\Model\Eshop');
    }
    public function carrier_services(){
        return $this->hasMany('App\Model\Carrier_service');
    }
}

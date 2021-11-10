<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;
    protected $table='carriers';
    protected $fillable = [
        'name',
        'eshop_id',
        'created_at',
        'updated_at'
    ];

    public function eshop(){
        return $this->belongsTo('App\Models\Eshop');
    }
    public function carrier_services(){
        return $this->hasMany('App\Models\Carrier_service');
    }
}

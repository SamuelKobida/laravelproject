<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier_service extends Model
{
    use HasFactory;
    protected $table='carrier_services';
    protected $fillable = [
        'name',
        'code',
        'carrier_id',
        'created_at',
        'updated_at'
    ];

    public function carrier(){
        return $this->belongsTo('App\Models\Carrier');
    }
    public function rules(){
        return $this->hasMany('App\Models\Rule');
    }
}

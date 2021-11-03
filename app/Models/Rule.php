<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'value',
        'carrier_service_id',
        'eshop_id',
        'subject_id',
        'predicate_id',
        'created_at',
        'updated_at'
    ];

    public function carrier_service(){
        return $this->belongsTo('App\Model\Carrier_service');
    }
    public function eshop(){
        return $this->belongsTo('App\Model\Eshop');
    }
    public function subject(){
        return $this->belongsTo('App\Model\Subject');
    }
    public function predicate(){
        return $this->belongsTo('App\Model\Predicate');
    }
}

<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'country_id',
        'created_at',
        'updated_at'
    ];

    public function country(){
        return $this->belongsTo('App\Models\Country');
    }

    public function deliveries(){
        return $this->belongsToMany('App\Models\Delivery','citydeliveries');
    }
}

<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function cities(){
        return $this->belongsToMany('App\Models\City','citydeliveries');
    }
}

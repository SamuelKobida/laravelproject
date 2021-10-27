<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CityDelivery extends Model
{
    protected $fillable = [
        'city_id',
        'delivery_id',
        'created_at',
        'updated_at'
    ];


}

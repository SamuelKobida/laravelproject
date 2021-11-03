<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
    public function cities(){
        return $this->hasMany('App\Model\City');
    }

}

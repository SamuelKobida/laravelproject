<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eshop extends Model
{
    use HasFactory;
    protected $table='eshops';
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function carriers(){
        return $this->hasMany('App\Models\Carrier');
    }
    public function rules(){
        return $this->hasMany('App\Models\Rule');
    }
}

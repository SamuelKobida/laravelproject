<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eshop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function carriers(){
        return $this->hasMany('App\Model\Carrier');
    }
    public function rules(){
        return $this->hasMany('App\Model\Rule');
    }
}

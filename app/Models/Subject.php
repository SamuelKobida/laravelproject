<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table='subjects';
    protected $fillable = [
        'name',
        'class',
        'created_at',
        'updated_at'
    ];

    public function rules(){
        return $this->hasMany('App\Models\Rule');
    }
}

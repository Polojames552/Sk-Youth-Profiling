<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    public function youths(){
        return $this->belongsToMany('App\youth');
    }

    protected $fillable = [
        'gender_name',
    ];
}

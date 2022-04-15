<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purok extends Model
{
    use HasFactory;

    public function youths(){
        return $this->belongsToMany('App\youth');
    }

    protected $fillable = [
        'purok_name',
    ];
}

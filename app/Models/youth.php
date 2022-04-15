<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Database\Factories\YouthFactory;


class youth extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public function genders(){
        return $this->belongsToMany('App\Gender');
    }
    public function educations(){
        return $this->belongsToMany('App\Education');
    }
    public function puroks(){
        return $this->belongsToMany('App\Purok');
    }
 /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'Fname',
        'Mname',
        'Lname',
        'EXTname',
        'Bday',
        'Age',
        'Sex',
        'parent',
        'CPno',
        'EducStatus',
        'Purok',
        'PWD',
        'CivilStatus',
        'Scholarship',
        'Occupation',
        'Sports1',
        'Sports2',
        'Sports3',
    ];

/**
 * Create a new factory instance for the model.
 *
 * @return \Illuminate\Database\Eloquent\Factories\Factory
 */
protected static function newFactory()
{
    return YouthFactory::new();
}

}

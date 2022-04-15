<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouthPrint extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'FullName',
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
}

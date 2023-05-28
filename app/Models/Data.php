<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    
    protected $table = 'data';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'gender',
        'image',
        'street',
        'location',
        'city',
        'state',
        'zip',
        'country',
        'lat',
        'lang',
        'comment',
    ];
}
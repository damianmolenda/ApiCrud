<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'email',
        'lastName',
        'id',
        'phoneNumber',
        'street',
        'city',
        'country',
    ];
}

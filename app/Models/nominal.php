<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nominal extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'adm',
        'year',
        'school',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'infos',
        'telephone',
        'more_telephone',
    ];
}

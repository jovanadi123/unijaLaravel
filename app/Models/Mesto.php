<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesto extends Model
{
    protected $table = 'mesta';

    protected $fillable = ['nazivMesta'];

    use HasFactory;
}
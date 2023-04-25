<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = 'timovi';

    protected $fillable = ['nazivTima'];

    use HasFactory;
}
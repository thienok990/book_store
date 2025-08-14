<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Author extends Model
{
    protected $fillable = ['name', 'slug'];
    protected $table = "author";
    public $timestamps = false;
}


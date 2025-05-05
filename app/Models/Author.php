<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ["name"];
    protected $table = "author";
    public $timestamps = false;
}

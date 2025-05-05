<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name"];
    protected $table = "category";
    public $timestamps = false;
}

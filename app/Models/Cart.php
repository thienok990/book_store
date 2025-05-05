<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'book_id', 'quantity', 'user_id'];
    protected $table = 'cart';
    public $timestamps = false;
    public function book(){
        return $this->belongsTo('book');
    }
}

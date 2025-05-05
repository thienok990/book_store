<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order_id', 'book_id', 'quantity', 'price', 'total'];
    public $table = 'order_details';
    public $timestamps = false;
}

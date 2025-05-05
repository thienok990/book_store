<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'total_price', 'status', 'phone', 'name', 'email', 'session_id', 'status', 'address'];
    public $table = "orders";
    public $timestamps = false;
}

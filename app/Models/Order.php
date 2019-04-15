<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total', 'identify', 'code', 'status', 'payment_method', 'date'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'sales')
                        ->withPivot('qty', 'price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'units', 'description', 'image'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

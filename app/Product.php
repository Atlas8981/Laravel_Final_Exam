<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = array('name', 'description', 'photo', 'price');

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}

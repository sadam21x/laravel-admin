<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = ['id'];

    public function categories()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }
}

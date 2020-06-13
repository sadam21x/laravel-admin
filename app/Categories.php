<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}

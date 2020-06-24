<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $guarded = ['id'];

    public function sales_detail()
    {
        return $this->hasMany('App\SalesDetail');
    }
}

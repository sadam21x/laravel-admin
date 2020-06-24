<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    protected $table = 'sales_details';
    protected $guarded = ['id'];

    public function sales()
    {
        return $this->belongsTo('App\Sales', 'nota_id');
    }
}

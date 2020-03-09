<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_type_id', 'img', 'name', 'content', 'sort',
    ];

    public function product_types()
    {
        return $this->belongsTo('App\ProductType', 'product_type_id')->orderby('sort', 'desc');
    }
}

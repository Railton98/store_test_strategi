<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'unit_price',
        'quantity',
    ];

    public function sales()
    {
        return $this->belongsToMany('App\Models\Sale', 'sales_products');
    }
}

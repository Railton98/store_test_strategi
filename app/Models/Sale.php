<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'sales_products');
    }
}

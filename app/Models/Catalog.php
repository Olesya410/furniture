<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = [
        'name',
        'img',
        'catalog_id'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // app/Models/Product.php
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

}
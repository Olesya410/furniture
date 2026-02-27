<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $table = 'products';


    protected $fillable = [
        'name',
        'img',
        'img_name', 
        'price',
        'price_old',
        'product_size',
        'description',
        'characteristic_id',
        'catalog_id',
        'product_id', 
    ];

    public function catalog()
    {
        return $this->belongsTo(ProductCatalog::class);
    }

    public function baskets()
    {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }


}

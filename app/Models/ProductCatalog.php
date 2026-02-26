<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCatalog extends Model
{
    protected $table = 'catalogs'; 
    
    protected $fillable = [
        'name',
        'img',
        'catalog_id',
    ];

    // Связь с каталогом
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    // Связь с товарами, если есть
    public function products()
    {
        return $this->hasMany(Product::class, 'catalog_id');
    }
    public function getNameAttribute()
    {
        return $this->name;
    }

    
}
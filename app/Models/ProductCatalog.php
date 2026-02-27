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

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'catalog_id');
    }
    public function getNameAttribute()
    {
        return $this->name;
    }

    
}

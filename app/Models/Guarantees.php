<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guarantees extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];
}
class ProductReturn extends Model{
    protected $fillable=[
        'title',
        'content',
    ];
}

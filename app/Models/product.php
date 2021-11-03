<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name_product',
        'price',
        'status',
        'quantity',
        'weight',
        'category_id',
        'image',
        'slug',
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function detail()
    {
        return $this->hasMany(OrderDetail::class,'id', 'product_id');
    }

}

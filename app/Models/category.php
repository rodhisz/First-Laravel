<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_category',
        'slug',
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductDiscount;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;

    public function discount() {
        return $this->hasOne(ProductDiscount::class, 'product_id', 'id');
    }

    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}

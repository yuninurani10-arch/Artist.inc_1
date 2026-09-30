<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable([
'category_id',
'nama_produk',
'deskripsi',
'harga',
'stok',
'is_active',
])]
class Product extends Model
{
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}

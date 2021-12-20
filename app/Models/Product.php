<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'price',
        'desc'
    ];

    public function first(int $id)
    {
        return Product::where(['id' => $id])->first();
    }

    public function deleteProduct(int $id)
    {
        return Product::where(['id' => $id])->delete();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // public function products()
    // {
    //     $products = Product::orderBy('created_at', 'desc')->get();
    // }

    // public function status()
    // {
    //     return $this->belongsTo(Status::class, 'status_id', 'id');
    // }
}

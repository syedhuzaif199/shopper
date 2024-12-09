<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    // protected $fillable = ["id", "name", "lft", "rgt"];
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

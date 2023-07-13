<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function cats()
    {
        return $this->hasMany(Category::class);
    }
    public function tovars()
    {
        return $this->hasMany(Tovar::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
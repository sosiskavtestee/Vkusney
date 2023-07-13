<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function tovars()
    {
        return $this->belongsToMany(Tovar::class)->withPivot('amount', 'price');
    }



    protected $fillable = ['user_id',];

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

}

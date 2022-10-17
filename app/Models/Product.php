<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','price','stock','description','img_path','img_name'
    ];

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function carts(){
        return $this->belongsToMany(Cart::class);
    }
    
    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function wishlists() {
        return $this->belongsToMany(Wishlist::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','price','stock','description','img_path','img_name'
    ];

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function orders(){
        return $this->BelongsToMany(Order::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function Products(){
        return $this->hasMany(Product::class);
    }
}

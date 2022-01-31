<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name','barcode', 'brand', 'price','image_url','date_added'];

    public function images()
    {
     return $this->hasMany('App\Image', 'product_id');
    }
}

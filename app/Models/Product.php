<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [

        'name','sub_category_id','shop_id', 'price', 'description', 'image'

    ];
    public function sub_category(){
        return $this->belongsTo(SubCategory::class);
    }
    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}

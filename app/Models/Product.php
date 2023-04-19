<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductDetail;

class Product extends Model
{
    //use HasFactory;

    use SoftDeletes;

    protected $table = "product";

    protected $guarded = [];
    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    
    public function categories(){

        return $this->belongsToMany(\App\Models\Category::class,'category_product');
    }

    public function detail(){
        return $this->hasOne(ProductDetail::class);
    }

}

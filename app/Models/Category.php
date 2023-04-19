<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;



class Category extends Model
{
    // use HasFactory;
    use SoftDeletes;

    protected $table = "category";

    protected $guarded = [];
    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';


    public function products(){
        return $this->belongsToMany(\App\Models\Product::class,'category_product');
        // return $this->belongsToMany(Product::class);
    }
}

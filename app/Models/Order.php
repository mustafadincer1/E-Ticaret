<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carts;


class Order extends Model
{
    use HasFactory;

    protected $table = "order";
    
    protected $fillable = [
        'sepet_id', 'siparis_tutari', 'durum',
        'adsoyad', 'adres', 'telefon', 'ceptelefonu', 'banka', 'taksit_sayisi'
    ];
    
    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';
    
    public function cart()
    {
        return $this->belongsTo(Carts::class);
    }

    public function carts_product_adet()
    {
        return DB::table('cart_product')
            ->whereRaw('silinme_tarihi is null')
            ->where('sepet_id', $this->id)
            ->sum('adet');
    }
}

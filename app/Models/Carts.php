<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Auth;


class Carts extends Model
{
    use HasFactory;

    protected $table = "cart";

    protected $guarded = [];
    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public static function aktif_sepet_id()
    {
        $aktif_sepet = DB::table('cart as c')
            ->leftJoin('order as o', 'o.sepet_id', '=', 'c.id')
            ->where('c.user_id', auth()->id())
            ->whereRaw('o.id is null')
            ->orderByDesc('c.olusturma_tarihi')
            ->select('c.id')
            ->first();

        if (!is_null($aktif_sepet)) return $aktif_sepet->id;
    }


    public function carts_product_adet()
    {
        return DB::table('cart_product')
            ->whereRaw('silinme_tarihi is null')
            ->where('sepet_id', $this->id)
            ->sum('adet');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserDetail;

class User extends Authenticatable
{
    use HasFactory;

    // protected $table='user';
    protected $fillable =['name_surname','email','password','activation_code','activation'];
    protected $hidden = ['password','activation_code'];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    public function detail()
    {
        return $this->hasOne(UserDetail::class)->withDefault();
    }

    
}

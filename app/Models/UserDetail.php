<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;



class UserDetail extends Model
{
    use HasFactory;
    protected $table= "user_detail";
    public $timestamps = false;
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

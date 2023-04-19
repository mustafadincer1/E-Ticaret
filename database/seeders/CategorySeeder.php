<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('category')->truncate();
        // $id = DB::table('category')->insertGetId(['kategori_adi'=>'Elektronik', 'slug'=>'elektronik']);
        DB::table('category')->insert(['kategori_adi'=> 'Elektronik', 'slug' => 'elektronik']);
        DB::table("category")->insert(['kategori_adi' => 'Kitap', 'slug' => 'kitap']);

        DB::table('category')->insert(['kategori_adi' => 'Dergi' , 'slug' => 'dergi']);
        DB::table('category')->insert(['kategori_adi' => 'Mobilya' , 'slug' => 'mobilya']);
        DB::table('category')->insert(['kategori_adi' => 'Dekorasyon' , 'slug' => 'dekorasyon']);
        DB::table('category')->insert(['kategori_adi'=> 'Kozmatik', 'slug' => 'kozmatik']);
        DB::table('category')->insert(['kategori_adi' => 'Kişisel Bakım' , 'slug' => 'kişisel-bakım']);
        DB::table('category')->insert(['kategori_adi' => 'Giyim ve Moda' , 'slug' => 'giyim-moda']);
        DB::table('category')->insert(['kategori_adi' => 'Anne ve Çocuk' , 'slug' => 'anne-çocuk']);

        
       

   
        $id = DB::table('category')->where('kategori_adi', 'Elektronik')->value('id');
        DB::table('category')->insert(['kategori_adi'=>'Bilgisayar/Tablet', 'slug'=>'bilgisayar-tablet', 'üst_id'=>$id]); 
        DB::table('category')->insert(['kategori_adi'=>'Telefon', 'slug'=>'telefon', 'üst_id'=>$id]); 

        DB::table("category")->insert(['kategori_adi' => 'TV ve Ses Sistemleri', 'slug' => 'tv-ses-sistemleri', 'üst_id'=> $id]);
        DB::table("category")->insert(['kategori_adi' => 'Kamera', 'slug' => 'kamera', 'üst_id'=> $id]);     
        
        
        $id = DB::table('category')->where('kategori_adi', 'Kitap')->value('id');
        DB::table("category")->insert(['kategori_adi' => 'Edebiyat', 'slug' => 'edebiyat', 'üst_id' => $id]);
        DB::table("category")->insert(['kategori_adi' => 'Çocuk', 'slug' => 'cocuk', 'üst_id' => $id]);
        DB::table("category")->insert(['kategori_adi' => 'Bilgisayar', 'slug' => 'bilgisayar', 'üst_id' => $id]);
        DB::table("category")->insert(['kategori_adi' => 'Sınavlara Hazırlık', 'slug' => 'sinavlara-hazirlik', 'üst_id' => $id]);





    }
}

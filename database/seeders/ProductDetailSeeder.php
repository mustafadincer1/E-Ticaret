<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $onay = ['onaylandi', 'onaylanmadi'];
        for ($i=0; $i <30 ; $i++) { 
            
            // DB::table('product_detail')->insert(['product_id'=>$i, 'show_slider'=>$onay[rand(0,1)], 
            // 'show_opportunity'=>$onay[rand(0,1)],'show_featured'=>$onay[rand(0,1)],
            // 'show_bestseller'=>$onay[rand(0,1)],'show_discount'=>$onay[rand(0,1)]]); 
            DB::table('product_detail')->insert(['product_id'=>$i, 'show_slider'=>rand(0,1), 
            'show_opportunity'=>rand(0,1),'show_featured'=>rand(0,1),
            'show_bestseller'=>rand(0,1),'show_discount'=>rand(0,1),]); 
        }
    }
}

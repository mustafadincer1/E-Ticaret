<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $faker = Faker::create();
        for ($i=0; $i <30 ; $i++) { 
           
            $ad=$faker->name();

            $product=Product::create([
                'ürün_adi' =>$ad,
                'slug'=>strtolower($ad),
                'aciklama'=>$faker->paragraph(),
                'fiyat'=>$faker->randomFloat(3,1,8)

                
            ]);
            $detail= $product->detail()->create([
                'show_slider'=>rand(0,1), 
                'show_opportunity'=>rand(0,1),
                'show_featured'=>rand(0,1),
                'show_bestseller'=>rand(0,1),
                'show_discount'=>rand(0,1)
            ]);

            // DB::table('product_detail')->insert(['product_id'=>$i, 'show_slider'=>rand(0,1), 
            // 'show_opportunity'=>rand(0,1),'show_featured'=>rand(0,1),
            // 'show_bestseller'=>rand(0,1),'show_discount'=>rand(0,1),]); 

            // DB::table('product_detail')->insert(['product=id'=>$i, 'show_slider'=>random_int(0,1), 
            // 'show_opportunity'=>random_int(0,1),'show_featured'=>random_int(0,1),
            // 'show_bestseller'=>random_int(0,1),'show_discount'=>random_int(0,1)]); 
        }
        // for ($i=0; $i <30 ; $i++) { 
            
        //     DB::table('product_detail')->insert(['product=id'=>$i, 'show_slider'=>random_int(0,1), 
        //     'show_opportunity'=>random_int(0,1),'show_featured'=>random_int(0,1),
        //     'show_bestseller'=>random_int(0,1),'show_discount'=>random_int(0,1)]); 
        // }
    }
}

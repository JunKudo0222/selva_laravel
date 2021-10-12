<?php

use Illuminate\Database\Seeder;

class Product_categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            
            ['name' => '収納家具','created_at' => new Datetime()],
            ['name' => '家電','created_at' => new Datetime()],
            ['name' => 'ファッション','created_at' => new Datetime()],
            ['name' => '美容','created_at' => new Datetime()],
            ['name' => '本・雑誌','created_at' => new Datetime()],
        ]);
    }
}

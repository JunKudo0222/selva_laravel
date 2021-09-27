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
            
            ['name' => '収納家具'],
            ['name' => '家電'],
            ['name' => 'ファッション'],
            ['name' => '美容'],
            ['name' => '本・雑誌'],
        ]);
    }
}

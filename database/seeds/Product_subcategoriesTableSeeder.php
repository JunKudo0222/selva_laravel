<?php

use Illuminate\Database\Seeder;

class Product_subcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_subcategories')->insert([
            
            ['name' => 'インテリア','product_categories_id'=>1],
            ['name' => '寝具','product_categories_id'=>1],
            ['name' => 'ソファ','product_categories_id'=>1],
            ['name' => 'ベッド','product_categories_id'=>1],
            ['name' => '照明','product_categories_id'=>1],
            ['name' => 'テレビ','product_categories_id'=>2],
            ['name' => '掃除機','product_categories_id'=>2],
            ['name' => 'エアコン','product_categories_id'=>2],
            ['name' => '冷蔵庫','product_categories_id'=>2],
            ['name' => 'レンジ','product_categories_id'=>2],
            ['name' => 'トップス','product_categories_id'=>3],
            ['name' => 'ボトム','product_categories_id'=>3],
            ['name' => 'ワンピース','product_categories_id'=>3],
            ['name' => 'ファッション小物','product_categories_id'=>3],
            ['name' => 'ドレス','product_categories_id'=>3],
            ['name' => 'ネイル','product_categories_id'=>4],
            ['name' => 'アロマ','product_categories_id'=>4],
            ['name' => 'スキンケア','product_categories_id'=>4],
            ['name' => '香水','product_categories_id'=>4],
            ['name' => 'メイク','product_categories_id'=>4],
            ['name' => '旅行','product_categories_id'=>5],
            ['name' => 'ホビー','product_categories_id'=>5],
            ['name' => '写真集','product_categories_id'=>5],
            ['name' => '小説','product_categories_id'=>5],
            ['name' => 'ライフスタイル','product_categories_id'=>5],
        ]);
    }
}

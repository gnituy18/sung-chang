<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        DB::table('products')->insert([
        'category_id' => 3,
        'order' => 1,
        'name' => '實木藝品',
        'eng_name' => 'collection',
      ]);
    }
}

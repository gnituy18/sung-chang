<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert(array(
            array('name' => '實木建材', 'eng_name' => 'Lumber', 'intro' => '提供實木加工訂製成各式建材，包括板材、角材、地板、門片、實木拼板、桌板等等。'),
            array('name' => '客製家具', 'eng_name' => 'Furniture', 'intro' => '實木之香味、質感越來越受到大眾的喜愛，但坊間不容易找到中意或者尺寸合宜的家具款式，歡迎帶著您的想法，藉由我們的專業一起跳脫傳統，激盪出屬於個人風格、量身訂做之實木家具！'),
            array('name' => '實木藝品', 'eng_name' => 'Collection', 'intro' => '藝品在空間中扮演畫龍點睛的效果，而實木藝品之自然色澤、紋路及香味，不但人工無法模仿更是其他材質無法取代的，每一個都是獨一無二絕無僅有！'),
        ));
    }
}

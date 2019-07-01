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
        DB::table('categories')->insert([
            [
              'name' => 'ダイニングバー',
            ],
            [
              'name' => '和食',
            ],
            [
              'name' => 'タイ料理',
            ],
            [
              'name' => '鉄板焼き',
            ],
            [
              'name' => 'イタリアン',
            ],
            [
              'name' => 'ビアバー',
            ],
            [
              'name' => '焼肉',
            ],
            [
              'name' => 'カフェ',
            ],
        ]);
    }
}

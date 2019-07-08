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
              'name' => 'ビジネス',
            ],
            [
              'name' => '不動産',
            ],
            [
              'name' => '転職',
            ],
            [
              'name' => '投資',
            ],
            [
              'name' => 'マーケティング',
            ],
            [
              'name' => 'エンジニア',
            ],
            [
              'name' => 'フリーランス',
            ],
            [
              'name' => '海外',
            ],
            [
              'name' => '雑記',
            ],
            [
              'name' => '英語',
            ],
            [
              'name' => '学生',
            ],
            [
              'name' => 'アニメ',
            ],
            [
              'name' => '漫画',
            ],
            [
              'name' => 'ガジェット',
            ],
            [
              'name' => 'グルメ',
            ],
            [
              'name' => 'カフェ',
            ],
            [
              'name' => '料理',
            ],
            [
              'name' => '筋トレ',
            ],

        ]);
    }
}

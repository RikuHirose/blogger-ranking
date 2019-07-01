<?php

use Illuminate\Database\Seeder;

class SituationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('situations')->insert([
            [
              'name' => 'カジュアル',
            ],
            [
              'name' => 'フォーマル',
            ],
            [
              'name' => 'ガチ',
            ],
            [
              'name' => '合コン',
            ],
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class AdminSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admin_menu')->insert([
        [
          'parent_id' => 8,
          'title'     => 'Caregories',
          'icon'      => 'fa-bars',
          'uri'       => 'categories',
        ],
        [
          'parent_id' => 8,
          'title'     => 'UseCaregories',
          'icon'      => 'fa-bars',
          'uri'       => 'usercategories',
        ],
      ]);


  }
}

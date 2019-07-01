<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(SituationsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(RestaurantImagesTableSeeder::class);
        // admin
        $this->call(AdminSeeder::class);
    }
}

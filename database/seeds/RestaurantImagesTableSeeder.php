<?php

use Illuminate\Database\Seeder;

class RestaurantImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurant_images')->insert([
          [
            'image_id'      => 1,
            'restaurant_id' => 1,
          ],
          [
            'image_id'      => 2,
            'restaurant_id' => 1,
          ],
          [
            'image_id'      => 3,
            'restaurant_id' => 1,
          ],
          [
            'image_id'      => 4,
            'restaurant_id' => 2,
          ],
          [
            'image_id'      => 5,
            'restaurant_id' => 3,
          ],
          [
            'image_id'      => 6,
            'restaurant_id' => 3,
          ],
          [
            'image_id'      => 7,
            'restaurant_id' => 4,
          ],
          [
            'image_id'      => 8,
            'restaurant_id' => 4,
          ],
          [
            'image_id'      => 9,
            'restaurant_id' => 5,
          ],
          [
            'image_id'      => 10,
            'restaurant_id' => 5,
          ],
          [
            'image_id'      => 11,
            'restaurant_id' => 7,
          ],
          [
            'image_id'      => 12,
            'restaurant_id' => 8,
          ],
          [
            'image_id'      => 13,
            'restaurant_id' => 9,
          ],
          [
            'image_id'      => 14,
            'restaurant_id' => 12,
          ],
          [
            'image_id'      => 15,
            'restaurant_id' => 14,
          ],
          [
            'image_id'      => 16,
            'restaurant_id' => 16,
          ],
          [
            'image_id'      => 17,
            'restaurant_id' => 17,
          ],
          [
            'image_id'      => 18,
            'restaurant_id' => 17,
          ],
          [
            'image_id'      => 19,
            'restaurant_id' => 18,
          ],
        ]);
    }
}

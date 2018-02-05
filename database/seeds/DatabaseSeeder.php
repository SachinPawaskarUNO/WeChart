<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
			med_lookup_valueTableSeeder::class,
			diagnosis_lookup_valueTableSeeder::class,
			imaging_orders_lookup_valueTableSeeder::class,
<<<<<<< HEAD
			lab_orders_lookup_valueTableSeeder::class,
            image_lookup_valueTableSeeder::class,
            audio_lookup_valueTableSeeder::class,
            video_lookup_valueTableSeeder::class,
            procedure_orders_lookup_valueTableSeeder::class,
            departmentTableSeeder::class
=======
			lab_orders_lookup_valueTableSeeder::class
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
		]);
    }
}

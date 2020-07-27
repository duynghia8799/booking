<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ( DB::table('services')->count() == 0 ) {
            DB::table('services')->insert([
                [
                    'name' => 'Dịch vụ 1',
                    'description' => 'Mô tả dịch vụ 1',
                    'duration' => 60,
                ],
                [
                    'level_name' => 'Dịch vụ 2',
                    'description' => 'Mô tả dịch vụ 2',
                    'duration' => 30,
                ],
            ]);
        }
    }
}

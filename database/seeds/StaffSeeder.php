<?php

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ( DB::table('staffs')->count() == 0 ) {
        	DB::table('staffs')->insert([
        		[
        			'name' => 'Nhân viên 1',
        			'description' => 'Mô tả nhân viên 1',
        		],
        		[
        			'level_name' => 'Nhân viên 2',
        			'description' => 'Mô tả nhân viên 2',
        		],
        	]);
        }
    }
}

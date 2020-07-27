<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ( DB::table('users')->count() == 0 ) {
        	DB::table('users')->insert([
        		[
        			'name' => 'Mai Duy Nghĩa',
        			'email' => 'maiduynghia87@gmail.com',
        			'password' => bcrypt('tatcah0ituvem0tcai'),
        			'remember_token' => bcrypt(uniqid()),
        			'role' => 500,
        			'status' => 1,
        		],
                [
                    'name' => 'Admin Tâm Sen',
                    'email' => 'admintamsen@gmail.com',
                    'password' => bcrypt('adminbooking'),
                    'remember_token' => bcrypt(uniqid()),
                    'role' => 500,
                    'status' => 1,
                ],
        	]);
        }
    }
}

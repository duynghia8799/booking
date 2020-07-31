<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ( DB::table('settings')->count() == 0 ) {
            DB::table('settings')->insert([
                [
                    'email' => 'nghiamd@1office.vn',
                ],
            ]);
        }
    }
}

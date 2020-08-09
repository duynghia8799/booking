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
                    'email' => 'maiduynghia87@gmail.com',
                    'hotline' => '0929358668',
                    'link_fb' => 'https://www.facebook.com/massagetamsen/',
                    'time_open' => '10:00 ~ 22:00 (từ thứ 2 đến thứ 6)',
                    'address' => 'Biệt thự B15-19 Vinhomes Gardenia, P. Cầu Diễn, Q. Nam Từ Liêm, Hà Nội',
                    'google_map' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.95238074428!2d105.765692615535!3d21.034591284403266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454be50f7894d%3A0x77ace9a6cc7e867!2sA2%20Vinhomes%20Gardenia!5e0!3m2!1sen!2s!4v1596635329515!5m2!1sen!2s" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>'
                ],
            ]);
        }
    }
}

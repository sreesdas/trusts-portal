<?php

use App\CpfMeeting;
use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CpfMeeting::create([
            'name' => 'CPF Meeting',
            'date' => '2019-10-10',
            'time' => '10:00'
        ]);
    }
}

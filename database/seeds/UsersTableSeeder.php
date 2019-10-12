<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sreenath Sivadas',
            'email' => 'sreenathsdas@gmail.com',
            'cpf' => '128238',
            'designation' => 'EE',
            'roles' => [ 'cpf-trustee', 'cpf-admin' ],
            // 'adminroles' => ['cpf'],
            // 'trusts' => ['cpf'],
            'password' => bcrypt('sree5633')
        ]);

        User::create([
            'name' => 'Himanshu Martoliya',
            'email' => 'h_martoliya@ongc.co.in',
            'cpf' => '95962',
            'designation' => 'CM',
            'roles' => [ 'csss-trustee', 'csss-admin' ],
            // 'adminroles' => ['csss'],
            // 'trusts' => ['csss'],
            'password' => bcrypt('sree5633')
        ]);
    }
}

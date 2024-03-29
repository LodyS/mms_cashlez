<?php

namespace Database\Seeders;
use App\Models\User;
use Hash;
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
        User::create([
            'name' => 'superadmin',
            'username'=>'admin',
            'email' => 'admin@cahlez.com',
            'privilege_user_id' => '0', // superadmin
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'Merchant Operation',
            'username'=>'demo_mo',
            'email' => 'mo@cahlez.com',
            'privilege_user_id' => '27', // merchant operation
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'Risk Analyst',
            'username'=>'demo_risk',
            'email' => 'risk@cahlez.com',
            'privilege_user_id' => '23', // risk analyst
            'password' => Hash::make('123456')
        ]);
    }
}

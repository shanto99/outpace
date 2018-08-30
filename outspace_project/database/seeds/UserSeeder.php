<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->user_id = 'accounts_manager';
        $user->email_id = 'accounts@outpacebd.com';
        $user->name = 'someone';
        $user->password = bcrypt('123');
        $user->user_rank = '2';
        $user->status = 'available';
        $user->capabilities = '4,3,';

        $user = new User();
        $user->user_id = 'commercial_executive1';
        $user->email_id = 'ebadul@outpacebd.com';
        $user->name = 'Ebadul';
        $user->password = bcrypt('123');
        $user->user_rank = '1';
        $user->status = 'available';


    }
}

<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'=>'gamal Khattab',
            'email'=>'gamy2430@gmail.com',
            'password'=>hash::make(12341234)
        ]);
        $user->attachRole('super_admin');
    }

}

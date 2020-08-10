<?php

use App\User;
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
        //
        if (User::all()->count() == 0){

            User::create([

               'name'=>'Innocent Hack',
               'email'=>'innocent@ymail.com',
               'admin'=>1,
               'password'=>Hash::make('**he*##asMe')

            ]);


        };

    }
}

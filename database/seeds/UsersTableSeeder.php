<?php

use Illuminate\Database\Seeder;
use Challenge\User;

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
            'name'      => 'Italo Morales',
            'slug'      => 'italomoralesf',
            'email'     => 'i@italomoralesf.com',
            'password'  => bcrypt(123456),
            'twitter'   => 'italomoralesf'
        ]);
        
        factory(User::class, 49)->create();
    }
}

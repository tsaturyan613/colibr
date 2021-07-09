<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cv_students')->insert([
            'name' => 'Andranik',
            'email' => 'hoghmrtsyan66.and@gmail.com',
            'password' => '123456',
            'profession'=>'programmer',
            'phone'=>'094680603',
            'address'=>'Yerevan',
            'published'=>1
        ]);
    }
   
}

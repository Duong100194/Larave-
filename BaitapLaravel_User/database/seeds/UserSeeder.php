<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//
//        DB::table('users')->insert(
//            [
//            ['user' => 'NGUYEN A', 'username' => 'NA',
//            'email' => 'NguyenA@gmail.com', 'address' => '123 塩見'],
//            [ 'user' => 'NGUYEN B', 'username' => 'NB',
//            'email' => 'NguyenB@gmail.com', 'address' => '456 塩見', ]
//            ]);
        $faker=Faker::create();
        foreach (range(1, 500) as $index)
        {
            DB::table('users')->insert([
                'user'=>$faker->firstName,
                'username'=>$faker->name,
                'email'=>$faker->email,
                'address'=>$faker->address()

              ]);
        }
   }
}

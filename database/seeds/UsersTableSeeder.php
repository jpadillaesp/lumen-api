<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //$users = factory(User::class)->create();// 1 row
        $users = factory(User::class,5)->create();
//        $this->call(UsersTableSeeder::class);
    }

}

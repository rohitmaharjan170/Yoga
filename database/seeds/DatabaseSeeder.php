<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        echo PHP_EOL , 'cleaning old data....';

        DB::table('admins')->delete();

        echo PHP_EOL, 'seeding tables...';

        \App\Admin::create(
            [
                'name' => 'Pradeep Gurung',
                'job_title' => 'Pradeep Gurung',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => null,
            ]
        );
//        \App\User::create(
//            [
//                'name' => 'Pradeep Gurung',
//                'job_title' => 'Pradeep Gurung',
//                'email' => 'user@gmail.com',
//                'password' => bcrypt('password'),
//                'remember_token' => null,
//            ]
//        );

    }
}
//userdefined data rakhna ko lagi seed use hunxa


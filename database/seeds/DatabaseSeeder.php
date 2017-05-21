<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('categories')->insert([
            ['name' => 'Informatique'],
            ['name' => 'Javascript'],
            ['name' => 'Test']
        ]);

        DB::table('users')->insert([
            'name' => 'Welldon',
            'email' => 'mael.mayon@free.fr',
            'password' => bcrypt('bonjour'),
        ]);
    }
}

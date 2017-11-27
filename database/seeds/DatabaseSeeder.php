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
        $this->call(RoleSeeder::class);
        // $this->call(PhuongTableSeeder::class);
        // $this->call(ChuThichSeeder::class);
        // $this->call(NhomDTSeeder::class);
    }
}

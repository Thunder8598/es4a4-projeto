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
        DB::table("topicos")->insert([
            "titulo"=>"aaaa",
            "permalink"=>"aaaa"
        ]);

        // $this->call(UserSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topicos')->insert([
            'titulo' => "Ola mundo",
            'permalink' => "ola-mundo",
        ]);
    }
}

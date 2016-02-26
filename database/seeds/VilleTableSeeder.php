<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VilleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$path = database_path();
         DB::unprepared(File::get( $path.'\ville.sql'));
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		Type::create( [
		'idType'=>1,
		'libType'=>'voiture'
		] );

					

		Type::create( [
		'idType'=>2,
		'libType'=>'moto'
		] );

    }
}

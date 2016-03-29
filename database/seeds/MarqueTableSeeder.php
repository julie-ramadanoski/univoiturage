<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Marque;

class MarqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Marque::create( [
            'idMarq'=>1,
            'nomMarq'=>'Renault'
        ] );
        Marque::create( [
			'idMarq'=>2,
			'nomMarq'=>'Honda'
		] );
    }
}

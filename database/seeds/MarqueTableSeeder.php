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
            'nomMarq'=>'Peugeot'
        ] );

        Marque::create( [
            'idMarq'=>3,
            'nomMarq'=>'Citroën'
        ] );

        Marque::create( [
            'idMarq'=>4,
            'nomMarq'=>'Audi'
        ] );

        Marque::create( [
            'idMarq'=>5,
            'nomMarq'=>'BMW'
        ] );
    }
}

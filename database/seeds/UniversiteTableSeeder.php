<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Universite;

class UniversiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Universite::create( [
		'idUniv'=>1,
		'nomUniv'=>'Aix Marseille Université',
		'adr1Univ'=>'adresse',
		'adr2Univ'=>NULL,
		'telUniv'=>'0411223344',
		'mailUniv'=>'uni-aix@yopmail.com',
		'photoUniv'=>NULL,
		'logoUniv'=>NULL,
		'latUniv'=>NULL,
		'longUniv'=>NULL,
		'inseeVille'=>13001
		] );

		Universite::create( [
		'idUniv'=>2,
		'nomUniv'=>'Avignon Université',
		'adr1Univ'=>'adresse 2',
		'adr2Univ'=>NULL,
		'telUniv'=>'0411223344',
		'mailUniv'=>'uni-avignon@yopmail.com',
		'photoUniv'=>NULL,
		'logoUniv'=>NULL,
		'latUniv'=>NULL,
		'longUniv'=>NULL,
		'inseeVille'=>84007
		] );
    }
}

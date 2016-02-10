<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Membre;

class MembreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

		Membre::create( [
		'idMemb'=>1,
		'nomMemb'=>'Bernard',
		'prenomMemb'=>'Patrice',
		'mailMemb'=>'bp@yopmail.com',
		'telMobMemb'=>'0611223344',
		'sexeMemb'=>1,
		'anNaisMemb'=>1980,
		'pseudoMemb'=>'beber',
		'presentMemb'=>NULL,
		'prefMemb'=>NULL,
		'casqueMemb'=>NULL,
		'photoMemb'=>NULL,
		'photoValidMemb'=>NULL,
		'nbAvisC'=>NULL,
		'nbAvisV'=>NULL,
		'totAvisC'=>NULL,
		'totAvisM'=>NULL,
		'nbInscrit'=>NULL,
		'mdpMemb'=>NULL,
		'site_idSite'=>1
		] );

					

		Membre::create( [
		'idMemb'=>2,
		'nomMemb'=>'Jacques',
		'prenomMemb'=>'Michelle',
		'mailMemb'=>'jm@trucmail.com',
		'telMobMemb'=>'0511223344',
		'sexeMemb'=>0,
		'anNaisMemb'=>2000,
		'pseudoMemb'=>'Michelounette',
		'presentMemb'=>NULL,
		'prefMemb'=>NULL,
		'casqueMemb'=>NULL,
		'photoMemb'=>NULL,
		'photoValidMemb'=>NULL,
		'nbAvisC'=>NULL,
		'nbAvisV'=>NULL,
		'totAvisC'=>NULL,
		'totAvisM'=>NULL,
		'nbInscrit'=>NULL,
		'mdpMemb'=>NULL,
		'site_idSite'=>1
		] );

			


    }
}

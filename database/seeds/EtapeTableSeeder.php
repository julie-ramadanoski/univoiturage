<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Etape;

class EtapeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Etape::create( [
		'idEtape'=>1,
		'adresseEtape'=>'centre ville valence',
		'inseeVille'=>26362
		] );

					

		Etape::create( [
		'idEtape'=>2,
		'adresseEtape'=>'garepierrelatte',
		'inseeVille'=>26235
		] );

					

		Etape::create( [
		'idEtape'=>3,
		'adresseEtape'=>'place bidule aix',
		'inseeVille'=>13001
		] );

					

		Etape::create( [
		'idEtape'=>4,
		'adresseEtape'=>'cathédrale gap',
		'inseeVille'=>5061
		] );

					

		Etape::create( [
		'idEtape'=>5,
		'adresseEtape'=>'centre aix',
		'inseeVille'=>13001
		] );

					

		Etape::create( [
		'idEtape'=>6,
		'adresseEtape'=>'cocotier marseille',
		'inseeVille'=>13055
		] );

					

		Etape::create( [
		'idEtape'=>7,
		'adresseEtape'=>'marseille',
		'inseeVille'=>13055
		] );

					

		Etape::create( [
		'idEtape'=>8,
		'adresseEtape'=>'aixe n provence',
		'inseeVille'=>13001
		] );

					

		Etape::create( [
		'idEtape'=>9,
		'adresseEtape'=>'valence',
		'inseeVille'=>26362
		] );

					

		Etape::create( [
		'idEtape'=>10,
		'adresseEtape'=>'gap',
		'inseeVille'=>5061
		] );

					

		Etape::create( [
		'idEtape'=>11,
		'adresseEtape'=>'valence',
		'inseeVille'=>26362
		] );

					

		Etape::create( [
		'idEtape'=>12,
		'adresseEtape'=>'pierrelatte',
		'inseeVille'=>26235
		] );

					

		Etape::create( [
		'idEtape'=>13,
		'adresseEtape'=>'aix',
		'inseeVille'=>13001
		] );

    }
}

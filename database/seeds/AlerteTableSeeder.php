<?php

use Illuminate\Database\Seeder;
use App\Alerte;
class AlerteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	 Alerte::create( [
		'idAlerte'=>1,
		'dateAlerte'=>'2016/03/14',
		'heureAlerte'=>'20h',
		'idEtapeDepartAlerte'=>1,
		'idEtapeArriveeAlerte'=>2,
		'idMemb'=>1,
		] );

    	 Alerte::create( [
		'idAlerte'=>2,
		'dateAlerte'=>'2016/03/14',
		'heureAlerte'=>'08h',
		'idEtapeDepartAlerte'=>4,
		'idEtapeArriveeAlerte'=>5,
		'idMemb'=>2,
		] );
	}
      
}

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
        Etape::create( ['idEtape'=>1, 'adresseEtape'=>'Paris', 	'inseeVille'=>75056] );
		Etape::create( ['idEtape'=>2, 'adresseEtape'=>'Lyon', 		'inseeVille'=>69123 ] );
		Etape::create( ['idEtape'=>3, 'adresseEtape'=>'marseille', 		'inseeVille'=>13055] );	

		Etape::create( ['idEtape'=>4, 'adresseEtape'=>'gap', 		'inseeVille'=>5061] );
		Etape::create( ['idEtape'=>5, 'adresseEtape'=>'aix', 			'inseeVille'=>13001] );
		Etape::create( ['idEtape'=>6, 'adresseEtape'=>'marseille', 	'inseeVille'=>13055] );

		Etape::create( ['idEtape'=>7, 'adresseEtape'=>'marseille', 				'inseeVille'=>13055] );
		Etape::create( ['idEtape'=>8, 'adresseEtape'=>'aix en provence', 		'inseeVille'=>13001] );
		Etape::create( ['idEtape'=>9, 'adresseEtape'=>'valence', 				'inseeVille'=>26362] );

		Etape::create( ['idEtape'=>10, 'adresseEtape'=>'gap', 					'inseeVille'=>5061] );
		Etape::create( ['idEtape'=>11, 'adresseEtape'=>'valence', 				'inseeVille'=>26362] );
		Etape::create( ['idEtape'=>12, 'adresseEtape'=>'pierrelatte', 			'inseeVille'=>26235] );
		Etape::create( ['idEtape'=>13, 'adresseEtape'=>'aix', 					'inseeVille'=>13001] );

		Etape::create( ['idEtape'=>14, 'adresseEtape'=>'gap', 		'inseeVille'=>5061] );
		Etape::create( ['idEtape'=>15, 'adresseEtape'=>'veynes', 	'inseeVille'=>5179] );
		Etape::create( ['idEtape'=>16, 'adresseEtape'=>'visan', 	'inseeVille'=>84150] );

		Etape::create( ['idEtape'=>17, 'adresseEtape'=>'grenoble', 	'inseeVille'=>38185] );
		Etape::create( ['idEtape'=>18, 'adresseEtape'=>'romans', 	'inseeVille'=>26281] );
		Etape::create( ['idEtape'=>19, 'adresseEtape'=>'valence', 	'inseeVille'=>26362] );
		Etape::create( ['idEtape'=>20, 'adresseEtape'=>'montélo', 	'inseeVille'=>26198] );
		Etape::create( ['idEtape'=>21, 'adresseEtape'=>'bollene', 	'inseeVille'=>84019] );
		Etape::create( ['idEtape'=>22, 'adresseEtape'=>'aix', 		'inseeVille'=>13001] );
		Etape::create( ['idEtape'=>23, 'adresseEtape'=>'marseille', 'inseeVille'=>13055] );

		Etape::create( ['idEtape'=>24, 'adresseEtape'=>'gap', 		'inseeVille'=>5061] );
		Etape::create( ['idEtape'=>25, 'adresseEtape'=>'aix', 		'inseeVille'=>13001] );
		Etape::create( ['idEtape'=>26, 'adresseEtape'=>'marseille', 'inseeVille'=>13055] );

		Etape::create( ['idEtape'=>27, 'adresseEtape'=>'gap', 		'inseeVille'=>5061] );
		Etape::create( ['idEtape'=>28, 'adresseEtape'=>'marseille', 'inseeVille'=>13055] );
		Etape::create( ['idEtape'=>29, 'adresseEtape'=>'La Ciotat', 'inseeVille'=>13028] );

    }
}

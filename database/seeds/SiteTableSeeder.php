<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Site;


class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Site::create( [
        'idSite'=>1,
        'nomSite'=>'Gap (site de)',
        'adr1Site'=>'adresse 1',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>5061
        ] );

       Site::create( [
        'idSite'=>2,
        'nomSite'=>'Schuman (site de)',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>3,
        'nomSite'=>'Jas de Boufan (site de)',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>4,
        'nomSite'=>'MontPerrin (site de)',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>5,
        'nomSite'=>'Gaston Berger (site de)',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>6,
        'nomSite'=>'IRT (site d\'   )',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>7,
        'nomSite'=>'L\'Arbois (site de)',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>8,
        'nomSite'=>'Arles (site de)',
        'adr1Site'=>'adresse 3',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>84007
        ] );
        Site::create( [
        'idSite'=>9,
        'nomSite'=>'Avignon (site d\')',
        'adr1Site'=>'adresse 3',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>84007
        ] );
Site::create( [
        'idSite'=>10,
        'nomSite'=>'Aubagne (site d\')',
        'adr1Site'=>'adresse 4',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13005
        ] );
        Site::create( [
        'idSite'=>11,
        'nomSite'=>'Digne-les-bains (site de)',
        'adr1Site'=>'adresse 5',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>4070
        ] );
Site::create( [
        'idSite'=>12,
        'nomSite'=>'La ciota (site de)',
        'adr1Site'=>'adresse 6',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13028
        ] );
Site::create( [
        'idSite'=>13,
        'nomSite'=>'Puyricard (site de)',
        'adr1Site'=>'adresse 7',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13921
        ] );
Site::create( [
        'idSite'=>14,
        'nomSite'=>'Chateau Gombert (site de)',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>15,
        'nomSite'=>'Virgile Marron (site de)',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>16,
        'nomSite'=>'Luminy (site de)',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>17,
        'nomSite'=>'Nord (site)',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>18,
        'nomSite'=>'Pharo (site du)',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>19,
        'nomSite'=>'Saint Charles (site de)',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>20,
        'nomSite'=>'Saint Jérôme (site de)',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>21,
        'nomSite'=>'Timone (site de la)',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
		'idSite'=>22,
		'nomSite'=>'Salon de Provence (site de)',
		'adr1Site'=>'adresse 8',
		'adr2Site'=>NULL,
		'idUniv'=>1,
		'inseeVille'=>13103
		] );

    }
}

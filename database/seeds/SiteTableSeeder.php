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
        'nomSite'=>'Gap',
        'adr1Site'=>'adresse 1',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>5061
        ] );

       Site::create( [
        'idSite'=>2,
        'nomSite'=>'Schuman',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>3,
        'nomSite'=>'Jas de Boufan',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>4,
        'nomSite'=>'MontPerrin',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>5,
        'nomSite'=>'Gaston Berger',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>6,
        'nomSite'=>'IRT',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>7,
        'nomSite'=>'L\'Arbois',
        'adr1Site'=>'adresse 2',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13001
        ] );
       Site::create( [
        'idSite'=>8,
        'nomSite'=>'Arles',
        'adr1Site'=>'adresse 3',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>84007
        ] );
        Site::create( [
        'idSite'=>9,
        'nomSite'=>'Avignon',
        'adr1Site'=>'adresse 3',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>84007
        ] );
Site::create( [
        'idSite'=>10,
        'nomSite'=>'Aubagne',
        'adr1Site'=>'adresse 4',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13005
        ] );
        Site::create( [
        'idSite'=>11,
        'nomSite'=>'Digne-les-bains',
        'adr1Site'=>'adresse 5',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>4070
        ] );
Site::create( [
        'idSite'=>12,
        'nomSite'=>'La ciota',
        'adr1Site'=>'adresse 6',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13028
        ] );
Site::create( [
        'idSite'=>13,
        'nomSite'=>'Puyricard',
        'adr1Site'=>'adresse 7',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13921
        ] );
Site::create( [
        'idSite'=>14,
        'nomSite'=>'Chateau Gombert',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>15,
        'nomSite'=>'Virgile Marron',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>16,
        'nomSite'=>'Luminy',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>17,
        'nomSite'=>'Nord',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>18,
        'nomSite'=>'Pharo',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>19,
        'nomSite'=>'Saint Charles',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>20,
        'nomSite'=>'Saint Jérôme',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
        'idSite'=>21,
        'nomSite'=>'Timone',
        'adr1Site'=>'adresse 8',
        'adr2Site'=>NULL,
        'idUniv'=>1,
        'inseeVille'=>13055
        ] );
Site::create( [
		'idSite'=>22,
		'nomSite'=>'Salon de Provence',
		'adr1Site'=>'adresse 8',
		'adr2Site'=>NULL,
		'idUniv'=>1,
		'inseeVille'=>13103
		] );

    }
}

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
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Model::unguard();

	    $this->call(VilleTableSeeder::class);
	    $this->call(UniversiteTableSeeder::class);
	    $this->call(SiteTableSeeder::class);
	    $this->call(TypeTableSeeder::class);
	    $this->call(MarqueTableSeeder::class);
	    $this->call(ModeleTableSeeder::class);

	    $this->call(UserTableSeeder::class); 
	    $this->call(VehiculeTableSeeder::class);
	    $this->call(TrajetTableSeeder::class);
	    $this->call(InscritTableSeeder::class);
	    $this->call(EtapeTableSeeder::class);
	    $this->call(AlerteTableSeeder::class);	
	    $this->call(EtapeTrajetTableSeeder::class);

	    Model::reguard();
    }
}

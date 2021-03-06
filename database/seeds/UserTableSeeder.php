<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            'id'=>1,
            'name'=>'Miw',
            'prenomMemb'=>'Carafond',
            'email' => 'carafond.miw@gmail.com',
            'telMobMemb'=>'0611364417',
            'sexeMemb'=>0,
            'anNaisMemb'=>1980,
            'pseudoMemb'=>'Carafond',
            'presentMemb'=>'Mec super sympa',
            'prefMemb'=>12223242,
            'casqueMemb'=>1,
            'photoMemb'=>'http://i.huffpost.com/gadgets/slideshows/312856/slide_312856_6329076_sq50.jpg',
            'photoValidMemb'=>1,
            'nbAvisC'=>4,
            'nbAvisV'=>6,
            'totAvisC'=>16,
            'totAvisM'=>12,
            'nbInscrit'=>0,
            'password'=>bcrypt('univoiturage'),
            'idSite'=>1
        ]);
        User::create( [
            'id'=>2,
            'name'=>'Bernard',
            'prenomMemb'=>'Patrice',
            'email' => 'monsieur.test@gmail.com',
            'telMobMemb'=>'0611223344',
            'sexeMemb'=>0,
            'anNaisMemb'=>1980,
            'pseudoMemb'=>'beber',
            'presentMemb'=>'Mec super sympa',
            'prefMemb'=>12223242,
            'casqueMemb'=>1,
            'photoMemb'=>'http://i.huffpost.com/gadgets/slideshows/312856/slide_312856_6329076_sq50.jpg',
            'photoValidMemb'=>1,
            'nbAvisC'=>4,
            'nbAvisV'=>6,
            'totAvisC'=>16,
            'totAvisM'=>12,
            'nbInscrit'=>0,
            'password'=>bcrypt('secret'),
            'idSite'=>1
        ]);
        User::create( [
            'id'=>3,
            'name'=>'Jacques',
            'prenomMemb'=>'Michelle',
            'email'=>'madame.test@gmail.com',
            'telMobMemb'=>'0511223344',
            'sexeMemb'=>1,
            'anNaisMemb'=>2000,
            'pseudoMemb'=>'Michelounette',
            'presentMemb'=>'Nana sérieuse',
            'prefMemb'=>12223242,
            'casqueMemb'=>0,
            'photoMemb'=>'https://yt3.ggpht.com/-vKmyKWf40Qc/AAAAAAAAAAI/AAAAAAAAAAA/2tdHP15kUG8/s48-c-k-no/photo.jpg',
            'photoValidMemb'=>0,
            'nbAvisC'=>1,
            'nbAvisV'=>0,
            'totAvisC'=>1,
            'totAvisM'=>0,
            'nbInscrit'=>5,
            'password'=>bcrypt('secret'),
            'idSite'=>1
        ] );
    }
}

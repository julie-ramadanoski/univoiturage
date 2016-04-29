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
            'email' => 'toto@gmail.com',
            'telMobMemb'=>'0611223344',
            'sexeMemb'=>1,
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
            'email'=>'jm@trucmail.com',
            'telMobMemb'=>'0511223344',
            'sexeMemb'=>0,
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
        User::create( [
            'id'=>4,
            'name'=>'zoefhij',
            'prenomMemb'=>'MOEFZ',
            'email'=>'zm@trucmail.com',
            'telMobMemb'=>'0600870454',
            'sexeMemb'=>1,
            'anNaisMemb'=>1975,
            'pseudoMemb'=>'Zoe',
            'presentMemb'=>'Nana Cool',
            'prefMemb'=>12223242,
            'casqueMemb'=>1,
            'photoMemb'=>'https://yt3.ggpht.com/-vKmyKWf40Qc/AAAAAAAAAAI/AAAAAAAAAAA/2tdHP15kUG8/s48-c-k-no/photo.jpg',
            'photoValidMemb'=>0,
            'nbAvisC'=>5,
            'nbAvisV'=>1,
            'totAvisC'=>20,
            'totAvisM'=>4,
            'nbInscrit'=>10,
            'password'=>bcrypt('secret'),
            'idSite'=>2
        ] );
        User::create( [
            'id'=>5,
            'name'=>'Piou',
            'prenomMemb'=>'oiseau',
            'email'=>'po@trucmail.com',
            'telMobMemb'=>'0600800040',
            'sexeMemb'=>1,
            'anNaisMemb'=>1945,
            'pseudoMemb'=>'Zoe',
            'presentMemb'=>'Une vieille dame',
            'prefMemb'=>12223242,
            'casqueMemb'=>1,
            'photoMemb'=>'https://yt3.ggpht.com/-vKmyKWf40Qc/AAAAAAAAAAI/AAAAAAAAAAA/2tdHP15kUG8/s48-c-k-no/photo.jpg',
            'photoValidMemb'=>0,
            'nbAvisC'=>0,
            'nbAvisV'=>16,
            'totAvisC'=>0,
            'totAvisM'=>16,
            'nbInscrit'=>0,
            'password'=>bcrypt('secret'),
            'idSite'=>2
        ] );
        User::create( [
            'id'=>6,
            'name'=>'rama',
            'prenomMemb'=>'julie',
            'email'=>'crossfiteuse@gmail.com',
            'telMobMemb'=>'0600800040',
            'sexeMemb'=>1,
            'anNaisMemb'=>1945,
            'pseudoMemb'=>'jenelius',
            'presentMemb'=>'Une vieille dame',
            'prefMemb'=>12223242,
            'casqueMemb'=>1,
            'photoMemb'=>'https://yt3.ggpht.com/-vKmyKWf40Qc/AAAAAAAAAAI/AAAAAAAAAAA/2tdHP15kUG8/s48-c-k-no/photo.jpg',
            'photoValidMemb'=>0,
            'nbAvisC'=>0,
            'nbAvisV'=>16,
            'totAvisC'=>0,
            'totAvisM'=>16,
            'nbInscrit'=>0,
            'password'=>bcrypt('secret'),
            'idSite'=>5
        ] );
    }
}

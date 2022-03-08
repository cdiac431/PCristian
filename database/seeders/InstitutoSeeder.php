<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstitutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institutos')->insert([
            'nom' => 'Institut Montsià',
            'localitat' => 'Amposta',
            'direccio' => 'Carrer Madrid 35',
            'telefon' => '977700043',
            'cif' => '987123621',
            'email' => 'institutmontsia@iesmontsia.org',
            'estat' => 'actiu',
            'lat' => '40.70936636900218',
            'lon' => '0.5824756256329267',
        ]);

        DB::table('institutos')->insert([
            'nom' => 'Institut Berenguer IV',
            'localitat' => 'Amposta',
            'direccio' => 'Carrer Mestre Suñer 1',
            'telefon' => '977701556',
            'cif' => '098276327',
            'email' => 'infoberenguer@insberenguer.org',
            'estat' => 'actiu',
            'lat' => '40.70999776639802',
            'lon' => '0.581200228622359',
        ]);

        DB::table('institutos')->insert([
            'nom' => 'Escola Francesc Platón i Sartí',
            'localitat' => 'Abrera',
            'direccio' => 'c. Salvador Espriu, 3',
            'telefon' => '937700381',
            'cif' => '08000013',
            'email' => 'a8000013@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.51482892580157',
            'lon' => '1.9009731151368587',
        ]);
        
        DB::table('institutos')->insert([
            'nom' => 'Escola Fabra',
            'localitat' => 'Alella',
            'direccio' => 'av. del Bosquet, 1',
            'telefon' => '935557803',
            'cif' => '08000049',
            'email' => 'a8000049@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.494661052469425',
            'lon' => '2.2978922190556146',
        ]);
        
        DB::table('institutos')->insert([
            'nom' => 'Escola La Forja - ZER Alt Lluçanès',
            'localitat' => 'Alpens',
            'direccio' => 'ctra. Lluçanesa, 8',
            'telefon' => '938527007',
            'cif' => '08000086',
            'email' => 'a8000086@xtec.cat',
            'estat' => 'actiu',
            'lat' => '42.120602934269',
            'lon' => '2.100864047881235',
        ]);
         
        DB::table('institutos')->insert([
            'nom' => 'Escola Bertí',
            'localitat' => 'L\'Ametlla del Vallès',
            'direccio' => 'Antic camí de Caldes, s/n',
            'telefon' => '938432778',
            'cif' => '08000098',
            'email' => 'a8000098@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.66675990520212',
            'lon' => '2.258862367056047',
        ]);
         
        DB::table('institutos')->insert([
            'nom' => 'La Presentació',
            'localitat' => 'Arenys de Mar',
            'direccio' => 'c. Pompeu Fabra, 2',
            'telefon' => '937920241',
            'cif' => '08000131',
            'email' => 'a8000131@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.157350713046306',
            'lon' => '1.1088610201830214',
        ]);
       
        DB::table('institutos')->insert([
            'nom' => 'Escola Joan Maragall',
            'localitat' => 'Arenys de Mar',
            'direccio' => 'c. Riera Sa Clavella, s/n',
            'telefon' => '937922802',
            'cif' => '08000153',
            'email' => 'a8000153@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.60414086035936',
            'lon' => '0.6440718769876724',
        ]);
        
        DB::table('institutos')->insert([
            'nom' => 'Escola Sant Martí',
            'localitat' => 'Arenys de Munt',
            'direccio' => 'c. Generalitat, 2',
            'telefon' => '937938070',
            'cif' => '08000165',
            'email' => 'a8000165@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.40462514964984',
            'lon' => '2.1978190115829572',
        ]);
         
        DB::table('institutos')->insert([
            'nom' => 'Escola Bernat de Riudemeia',
            'localitat' => 'Argentona',
            'direccio' => 'c. Bernat de Riudemeia, 27',
            'telefon' => '937970956',
            'cif' => '08000189',
            'email' => 'a8000189@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.55337113355032',
            'lon' => '2.401131587039404',
        ]);

        DB::table('institutos')->insert([
            'nom' => 'Vedruna Artés',
            'localitat' => 'Artés',
            'direccio' => 'c. Carme, 16',
            'telefon' => '938305212',
            'cif' => '08000220',
            'email' => 'a8000220@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.79787551448053',
            'lon' => '1.9526958164572246',
        ]);
        
        DB::table('institutos')->insert([
            'nom' => 'Escola Doctor Ferrer',
            'localitat' => 'Artés',
            'direccio' => 'c. Barcelona, 23',
            'telefon' => '938305377',
            'cif' => '08000244',
            'email' => 'a8000244@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.7952606100236',
            'lon' => '1.9519946307932934',
        ]);

        DB::table('institutos')->insert([
            'nom' => 'Escola Santa Maria d\'Avià',
            'localitat' => 'Avià',
            'direccio' => 'c. Escoles, s/n',
            'telefon' => '938230376',
            'cif' => '08000271',
            'email' => 'a8000271@xtec.cat',
            'estat' => 'actiu',
            'lat' => '42.07700224553047',
            'lon' => '1.8191283670500225',
        ]);

        DB::table('institutos')->insert([
            'nom' => 'Escola d\'Avinyonet del Penedès',
            'localitat' => 'Avinyonet del Penedès',
            'direccio' => 'pg. de la Grava, s/n',
            'telefon' => '938970443',
            'cif' => '08000347',
            'email' => 'a8000347@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.35989202982034',
            'lon' => '1.782977407820169',
        ]); 

        DB::table('institutos')->insert([
            'nom' => 'Escola La Muntanya',
            'localitat' => 'Aiguafreda',
            'direccio' => 'c. Núria, s/n',
            'telefon' => '938440179',
            'cif' => '08000359',
            'email' => 'a8000359@xtec.cat',
            'estat' => 'actiu',
            'lat' => '41.770574367725516',
            'lon' => '2.250447902421945',
        ]); 
    }
}

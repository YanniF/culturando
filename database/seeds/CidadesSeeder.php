<?php

use Illuminate\Database\Seeder;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cidades')->insert(['nome' => 'Bertioga', 'baixadaOuVale' => 'Baixada']);
        DB::table('cidades')->insert(['nome' => 'Cubatão', 'baixadaOuVale' => 'Baixada']);
        DB::table('cidades')->insert(['nome' => 'Guarujá', 'baixadaOuVale' => 'Baixada']);
        DB::table('cidades')->insert(['nome' => 'Itanhaém', 'baixadaOuVale' => 'Baixada']);
        DB::table('cidades')->insert(['nome' => 'Mongaguá', 'baixadaOuVale' => 'Baixada']);
        DB::table('cidades')->insert(['nome' => 'Peruíbe', 'baixadaOuVale' => 'Baixada']);
        DB::table('cidades')->insert(['nome' => 'Praia Grande', 'baixadaOuVale' => 'Baixada']);
        DB::table('cidades')->insert(['nome' => 'Santos', 'baixadaOuVale' => 'Baixada']);
        DB::table('cidades')->insert(['nome' => 'São Vicente', 'baixadaOuVale' => 'Baixada']);

        DB::table('cidades')->insert(['nome' => 'Cananéia', 'baixadaOuVale' => 'Vale']);
        DB::table('cidades')->insert(['nome' => 'Ilha Comprida', 'baixadaOuVale' => 'Vale']);
        DB::table('cidades')->insert(['nome' => 'Miracatu', 'baixadaOuVale' => 'Vale']);
        DB::table('cidades')->insert(['nome' => 'Registro', 'baixadaOuVale' => 'Vale']);
    }
}

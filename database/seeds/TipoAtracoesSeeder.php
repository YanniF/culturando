<?php

use Illuminate\Database\Seeder;

class TipoAtracoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_atracoes')->insert(['tipo' => 'Teatro']);
        DB::table('tipo_atracoes')->insert(['tipo' => 'Música']);
        DB::table('tipo_atracoes')->insert(['tipo' => 'Cultura na Rua']);
        DB::table('tipo_atracoes')->insert(['tipo' => 'Turismo']);
        DB::table('tipo_atracoes')->insert(['tipo' => 'Museu']);
        DB::table('tipo_atracoes')->insert(['tipo' => 'Biblioteca']);
        DB::table('tipo_atracoes')->insert(['tipo' => 'Galeria de Arte']);
    }
}
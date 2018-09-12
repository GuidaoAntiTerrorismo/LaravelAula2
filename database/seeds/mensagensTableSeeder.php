<?php

use Illuminate\Database\Seeder;
use App\Mensagem;

class mensagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mensagem::create([
            'titulo' => 'Prova de Matemática',
            'texto' => 'Prova sobre números imaginários',
            'autor' => 'Tiago'
        ]);

        Mensagem::create([
            'titulo' => 'Prova de Matemática',
            'texto' => 'Prova sobre números imaginários',
            'autor' => 'Tiago'
        ]);

        Mensagem::create([
            'titulo' => 'Prova de Matemática',
            'texto' => 'Prova sobre números imaginários',
            'autor' => 'Tiago'
        ]);

        Mensagem::create([
            'titulo' => 'Prova de Matemática',
            'texto' => 'Prova sobre números imaginários',
            'autor' => 'Tiago'
        ]);

        Mensagem::create([
            'titulo' => 'Prova de Matemática',
            'texto' => 'Prova sobre números imaginários',
            'autor' => 'Tiago'
        ]);
    }
}

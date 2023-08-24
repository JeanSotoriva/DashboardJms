<?php

namespace Database\Seeders;
use App\Models\Colaborator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Helpers\SeederHelper;

class ColaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = SeederHelper::getUserId();

        Colaborator::create([
            'matricula' => 1,
            'usuario_id' => $userId,
            'cpf' => '03512659020',
            'nome' => 'Jean Marcos Sotoriva',
            'email' => 'jeansotoriva@gmail.com',
            'telefone' => '5599265959',
            'cargo' => 'QA',
            'funcao' => 'Analista de Qualidade',
            'data_nascimento' => '12/05/1994',
            'data_admissao' => '05/07/2022',
            'data_recisao' => null,
            'ativo'  => true,
        ]);
    }
}

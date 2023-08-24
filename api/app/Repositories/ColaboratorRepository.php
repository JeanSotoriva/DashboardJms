<?php

namespace App\Repositories;

use App\Models\Colaborator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ResponseController as ResponseController;
use App\Models\Timestamp;
use Illuminate\Http\Request;
use App\Models\User;
use SebastianBergmann\Environment\Console;

class ColaboratorRepository extends ResponseController
{
    protected $entity;
    protected $colaborator;

    public function __construct(Colaborator $colaborator)
    {
        $this->entity = $colaborator;
    }

    public function getColaboratorByUserLoged()
    {
        $user = Auth::user();
        $colaboratorLoged = Colaborator::where('usuario_id', $user->id)->first();
        return $colaboratorLoged;
    }

    public function getColaborators()
    {
        $colaborators = Colaborator::all();
        return $colaborators;
    }

    public function CreateColaborator(Request $request)
    {
        return Colaborator::create([
            'usuario_id' => $request->usuario_id,
            'cpf' => $request->cpf,
            'nome'=> $request->nome,
            'email'=> $request->email,
            'telefone' => $request->telefone,
            'cargo'=> $request->cargo,
            'funcao'=> $request->funcao,
            'data_nascimento' => $request->data_nascimento,
            'data_admissao' => $request->data_admissao,
            'data_recisao'=> null,
            'ativo' => true
        ]);
    }


    public function updateColaboratorData(Request $request)
    {
        $colaborator = Colaborator::where('cpf', $request->cpf)->first();
        $colaborator->nome = $request['nome'];
        $colaborator->email = $request['email'];
        $colaborator->telefone = $request['telefone'];
        $colaborator->cargo = $request['cargo'];
        $colaborator->funcao = $request['funcao'];
        $colaborator->data_nascimento = $request['data_nascimento'];
        $colaborator->data_admissao = $request['data_admissao'];
        $colaborator->data_recisao = $request['data_recisao'];
        $colaborator->save();
        return $colaborator;
    }

    public function deleteColaborator(Request $request){
        
    }

    public function getTimestampsByColaborator($colaboratorLoged)
    {
        $timestamps = Timestamp::where('matricula_id', $colaboratorLoged->matricula)->first();
        return $timestamps;
    }

    public function registerTimestampsByColaborator($colaboratorLoged, Request $request)
    {
        return Timestamp::create([
            'matricula_id' => $colaboratorLoged->matricula,
            'entrada' => $request->entrada,
            'saida'=> $request->saida,
            'localizacao'=> $request->localizacao,
        ]);
    }

    public function findColaboratorByCpfExists(Request $request)
    {
        return Colaborator::where('cpf', $request->cpf)->exists();
    }
}
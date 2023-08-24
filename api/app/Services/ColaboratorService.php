<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController as ResponseController;
use App\Models\Colaborator;
use App\Repositories\ColaboratorRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;


class ColaboratorService extends ResponseController
{

    protected $repository;

    public function __construct(ColaboratorRepository $ColaboratorRepository)
    {
        $this->repository = $ColaboratorRepository;
    }

    public function getColaborators()
    {
        $colaborators = $this->repository->getColaborators();
        return $this->sendResponse($colaborators, 'Dados dos Colaboradores');
    }

    public function CreateColaborator(Request $request){
        
        $colaborator = $this->repository->CreateColaborator($request);
        return $this->sendResponse([
            $colaborator->nome,
            $colaborator->email,
            $colaborator->created_at,
        ], 'Colaborador criado com Sucesso.', 201);
    }

    public function updateColaborator(Request $request)
    {
        $colaborator = $this->repository->findColaboratorByCpfExists($request);
        if (!$colaborator) {
            return $this->sendError('error', 'Colaborador não encontrado', 404);
        }
        $newColaborator = $this->repository->updateColaboratorData($request);
        if(!$newColaborator){
            return $this->sendError('error', 'Algo saiu errado', 404);
        }
        return $this->sendResponse([
            $newColaborator->nome,
            $newColaborator->email,
            $newColaborator->telefone,
        ], 'Dados Atualizados com Sucesso.');
    }

    public function deleteColaborator(Request $request){
        return $this->sendError('error', 'Deletar colaborador ainda não foi implementado', 501);
    }
    
}
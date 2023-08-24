<?php 

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController as ResponseController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;


class UserService extends ResponseController
{

    protected $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function updateUsuario(Request $request)
    {
        $user = $this->repository->updateUsuario($request);
        return $this->sendResponse([
            'Username' => $user->username,
            'Senha' => '*********',
            'Role' => $user->role,
            
        ], 'Dados Atualizados com Sucesso.');
    }
    public function delete(Request $request){
        $user = $this->repository->findDeleteUser($request);
        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado'], 404);
        }
        $user->tokens->each(function ($token, $key) {
            $token->delete();
        });
        $user->delete();
        return $this->sendResponse('success', 'Usuário excluído com sucesso.', 200);
        
    }
    
}
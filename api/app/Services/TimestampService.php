<?php 

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController as ResponseController;
use App\Models\Timestamp;
use App\Repositories\ColaboratorRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;


class TimestampService extends ResponseController
{

    protected $repository;

    public function __construct(ColaboratorRepository $colaboratorRepository)
    {
        $this->repository = $colaboratorRepository;
    }

    public function getTimestamps()
    {
        $colaboratorLoged = $this->repository->getColaboratorByUserLoged();
        $timestamps = $this->repository->getTimestampsByColaborator($colaboratorLoged);
        return $this->sendResponse($timestamps, 'Timestamp do usuario', 200);
    }

    public function registerTimestamps(Request $request){
        $colaboratorLoged = $this->repository->getColaboratorByUserLoged();
        $register = $this->repository->registerTimestampsByColaborator($colaboratorLoged, $request);
        return $this->sendResponse($register, 'Ponto registrado!', 201);
    }
    
}
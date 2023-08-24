<?php

namespace App\Http\Controllers\Api;

use App\Services\ColaboratorService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ResponseController as ResponseController;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Colaborator;
use App\Services\TimestampService;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Symfony\Component\VarDumper\Cloner\Data;

class TimestampController extends Controller
{
    protected $timesTampService;

    public function __construct(TimestampService $timesTampService)
    {
        $this->timesTampService = $timesTampService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function timestamps()
    {
        return $this->timesTampService->getTimestamps();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        return $this->timesTampService->registerTimestamps($request);
    }

}

<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ResponseController as ResponseController;
use Illuminate\Http\Request;

class UserRepository extends ResponseController
{
    protected $entity;
    protected $user;

    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    public function updateUsuario(Request $request)
    {
        $user = Auth::user();
        $user->username = $request['username'];
        $user->password = bcrypt($request['password']);
        $user->role = $request['role'];
        $user->save();
        return $user;
    }

    public function findDeleteUser(Request $request){
        $user = User::where('username', $request->username)->first();
        return $user;
    }

}
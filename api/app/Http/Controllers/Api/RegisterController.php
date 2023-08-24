<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController as ResponseController;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class RegisterController extends ResponseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $data = $request->all();

        if (User::where('username', $request->username)->exists()) {
            return $this->sendError('error', 'O usuário já existe.', 400);
        }
 
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $success['username'] =  $user->username;
        $success['role'] =  $user->role;
        return $this->sendResponse($success, 'Usuario registrado com Sucesso!', 201);
    }
}
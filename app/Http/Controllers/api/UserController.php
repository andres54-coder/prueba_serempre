<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt');
    }
    public function show($id): \Illuminate\Http\JsonResponse
    {

        $user= User::findOrFail($id);
        return response()->json([
            "name"=>$user->name,
            "email"=>$user->email
        ],200);
    }
    public function update(Request $request,$id): \Illuminate\Http\JsonResponse
    {
        $user=User::findOrFail($id);
        $validator=Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['required'],
        ]);
        if ($validator->fails()){
            return response()->json([
                "error"=>"data validation failed",
                "error_list"=>$validator->errors(),
            ],400);
        }
        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->save();
        return response()->json([
            "name"=>$user->name,
            "email"=>$user->email,
            "pass"=>$request->password,
            "msg"=> "usuario actualizado con exito!!"
        ],200);
    }
}

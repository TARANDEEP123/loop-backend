<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;
    public function register(Request $request)
    {
        $vaildationArr = [
            'email'=>'required|email',
            'name' => 'required',
            'password' => 'required|min:8'
        ];
        $reVal = $this->validateUser($request, $vaildationArr);

       if (!is_array($reVal)) {
             return $this->errorWithMessage($reVal, "Error", 400);
        }

        $this->createUser($request);
        return $this->success($this->user);
    }

    protected function createUser($request) {
        $userAttr = $request->all();
        $userAttr['password'] = bcrypt($userAttr['password']);
        $this->user = User::create($userAttr);
    }

    public function validateUser($request, $arr) {
        $validate = Validator::make($request->all(), $arr);
        if($validate->fails()) {
            return $validate->errors()->all()[0];
        }
        return [];
    }

    public function login(Request $request) {
        $vaildationArr = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $reVal = $this->validateUser($request, $vaildationArr);
        if (!is_array($reVal)) {
            return $this->errorWithMessage($reVal,"Error", 400);
        }
        $userDetails = $request->all();
        if (!Auth::attempt($userDetails)) {
            return response(['message' => 'Invalid Credentials']);
        }
        $this->user = Auth::user();

        $this->createToken();
        return $this->success($this->user, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function createToken()
    {
        $this->user['access_token'] = $this->user->createToken('token')->accessToken;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->successWithMessage([],'You have been successfully logged out.', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

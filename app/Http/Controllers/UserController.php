<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('UsersManagement.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddUser(Request $request)
    {
        $rules = array (
            'name' => 'required',
            'username'=> 'required',
            'role' => 'required',
            'password' => 'required'
        );

        $validator = Validator::make ( Input::all(), $rules );
        if ($validator->fails ())
            return Response::json ( array (
                        
                    'errors' => $validator->getMessageBag ()->toArray ()
            ) );
            else {
                $user = User::create([
                            'name' => $request->name,
                            'username' => $request->username,
                            'address' => $request->address,
                            'role' => $request->role,
                            'password' => $request->password,
                        ]);
                return response ()->json ( $user );
            }
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

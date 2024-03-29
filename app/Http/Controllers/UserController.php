<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

            return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|in:1,2,3',
            'email' => 'required|email|unique:users', // Make sure email is unique
            'password' => 'required|min:8',
        ]);
        // You should use $request->input('password') instead of 'temp-password'
        $user = User::create([
            'name' => $validatedData['name'],
            'role' => $validatedData['role'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        $users = User::all();
        return view('admin.user.index')->with('users', $users);
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
        $user = User::findOrFail($id);

        return view('admin.user.edit')->with('user',$user);
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
        try{
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required|numeric',
                'email' => 'required|email',
            ]);

            $user = User::findorFail($id);

            $user->update([
                'name' => $request->name,
                'role' => $request->role,
                'email' => $request->email,
            ]); 

            $users = User::all();

            return view('admin.user.index')->with([
                'users'=>$users,
                'user_name'=>$user->name
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id);

        $userName = $deleteUser->name;
        $deleteUser->destroy($id);

        if ($deleteUser) {
            return response()->json(['message' => $userName. 'deleted successfully']);
        }else{
            return response()->json(['message' => $userName. 'Deletion failed!']);
        }
    }
}

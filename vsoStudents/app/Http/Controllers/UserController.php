<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Profile;
use App\UserLectureHomework;

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
        
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = User::create([
                'name'      => $request['name'],                
                'email'     => $request['email'],
                'password'  => bcrypt($request['password']),
            ]);
        
        $user_profile = Profile::create([
                'bio'           =>  $request['bio'],
                'photo_path'    =>  $request['photo_path'],
                'user_id'       =>  $user->id
            ]);
        
            

        return redirect()->route('get_all_users')->withSuccess('New Student Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user           = User::find($id);
        $user_homeworks = UserLectureHomework::where('user_id', '=', $id)->get();

        return view('users.show', compact('user', 'user_homeworks'));
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

       return view('users.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $user->name      = $request['name'];                
        $user->email     = $request['email'];
        $user->password  = bcrypt($request['password']);
        
        $user->save();

        
        User::find($id)->profile()->update(array(
            'bio'           => $request['bio'],
            'photo_path'    => $request['photo_path']
        ));
                       

        return redirect()->route('get_all_users')->withSuccess('New Student Successfully Created');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        $user = User::find($id);
        // $user->profile()->delete();
        $user->delete();

        return redirect()->route('users.index')->withSuccess('Student deleted');
    }
}

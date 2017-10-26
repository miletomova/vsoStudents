<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Profile;
use App\UserLectureHomework;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Carbon\Carbon;

use File;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = User::all();
        $time   = Carbon::now();
        
        return view('users.index', compact(['users', 'time']));
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
     * @param  App\Http\Requests\StoreUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //clean the directory before uploading a new file
        File::cleanDirectory('temp\\');   

        $filename = $request->file('my_photo')->getClientOriginalName();
       
        $request->file('my_photo')->move('temp', $filename);

        //$path = public_path().'//temp/'.$filename;
        
        $user = User::create([
                'name'          => $request['name'],                
                'email'         => $request['email'],
                'password'      => bcrypt($request['password']),                
            ]);
        
        $user_profile = Profile::create([
                'photo_path'    =>  $filename,
                'bio'           =>  $request['bio'],                
                'user_id'       =>  $user->id
            ]);
        
            

        return redirect()->route('get_all_users')->withSuccess('New Student Successfully Created');
        // return redirect()->route('get_all_users')->with('message', 'New Student Successfully Created');
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
        $user_homeworks = UserLectureHomework::where('user_id', '=', $id)->first();
        $user_profile   = Profile::where('user_id', '=', $id)->first();

        return view('users.show', compact('user', 'user_homeworks', 'user_profile'));
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
    public function update(UpdateUserRequest $request, $id)
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
    public function destroy($user_id)
    {
        $profile = Profile::where('user_id', '=', $user_id);
        $profile->delete();

        $user = User::find($user_id);        
        $user->delete();
        
        return redirect()->route('get_all_users')->with(['success'=>'post successfully deleted!']);
    }
}

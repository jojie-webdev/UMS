<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \App\User;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Display All User from database
        // $users = DB::table('users')->get();
        // return view('users.index', ['users' => $users]);

        //Users Join table
        $users= DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->get();
        // return $users;
        return view('users.index', ['users' => $users]);

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
    public function store(Request $request)
    {
        //
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
        $user = Auth::user();
        // dd($user);
        return view('users.profile', compact('user'));
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
        $user = Auth::user();
        $data = $request->validate([
            'name' => 'required',
            'company' => 'string|max:255',
            'address' => 'required|string|max:255',
            'age' => 'nullable',
            'gender' => 'required|string|max:255',
            'about_me' => 'string|max:255',
            'password' => 'nullable',
            'confirm-password' => 'nullable',
            'filename' => 'image|mimes:jpeg,png,gif|max:2048',
        ]);

        //initalize image
        $image = " ";

        //If has a filename to be uploaded
        if($request->hasfile('filename')) 
        { 
            $file = $request->file('filename');
            $extension = rand() .'.'.$file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move(public_path("uploads/"), $filename);
            $user->filename = $filename;

        }
        
        //Password Validation
        if ($request->input('password') !== $request->input('confirm-password')) {
            return back()->with('message-error', 'Password Confirmation does not matched!!!');
        }
        else if (empty($request->input('password') && $request->input('confirm-password'))) {
            $user->name = $request->input('name');
            $user->company = $request->input('company');
            $user->address = $request->input('address');
            $user->age = $request->input('age');
            $user->gender = $request->input('gender');
            $user->about_me = $request->input('about_me');
            $user->email = $request->input('email');
            $user->save();

            //get path
            // return back()->with('message', 'Updated Successfully!')->with('path', $image);
            return back()->with('message', 'Updated Successfully!');
        }
        else {
            $user->name = $request->input('name');
            $user->company = $request->input('company');
            $user->address = $request->input('address');
            $user->age = $request->input('age');
            $user->gender = $request->input('gender');
            $user->about_me = $request->input('about_me');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return back()->with('message', 'Updated Successfully!!');
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
        //
    }
}

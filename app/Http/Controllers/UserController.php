<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 

        return view('user.index', compact('users') );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->designation = $request->designation;
        $user->adminroles = $user->adminroles ? ( $request->adminroles ? array_unique(array_merge($user->adminroles, $request->adminroles)) : array_diff( $user->adminroles, Auth::user()->trusts ) ) : $request->adminroles;
        $user->trusts = $user->trusts ? ( $request->trusts ? array_unique(array_merge($user->trusts, $request->trusts)) : array_diff( $user->trusts, Auth::user()->adminroles ) ) : $request->trusts;
        $user->save();

        return redirect('/user')->with('success', "User $user->name updated");
    }

    public function destroy($id)
    {
        //
    }
}
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
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cpf' => 'required',
            'name' => 'required',
            'password' => 'required',
            'designation' => 'nullable',
            'email' => 'required',
            'mobile' => 'required',
        ]);

        $user = User::create($validated);
        // $user->roles = ['member'];
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/user')->with('success', "User $user->name created");
    }

    public function show(User $user)
    {
        if($user->id == Auth::user()->id) {
            return view('user.show', compact('user'));
        } else {
            if( Auth::user()->isAdminOfAny() ){
                return view('user.show', compact('user'));
            } else {
                return redirect('/user')->with('error', "Can't view other user's details");
            }
        }
        
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

        if( !$request->roles ) {
            $roles = array_diff($user->roles, Auth::user()->roles);
        } else {
            if( $user->roles ) {
                $diff = array_diff(Auth::user()->roles, $request->roles);
                $roles = array_unique(array_merge($user->roles, $request->roles));
                if($user->roles != $diff) $roles = array_diff($roles, $diff);
            } else {
                $roles = $request->roles;
            }
        }
        $user->roles = $roles;

        // $user->adminroles = $user->adminroles ? ( $request->adminroles ? array_unique(array_merge($user->adminroles, $request->adminroles)) : array_diff( $user->adminroles, Auth::user()->trusts ) ) : $request->adminroles;
        // $user->trusts = $user->trusts ? ( $request->trusts ? array_unique(array_merge($user->trusts, $request->trusts)) : array_diff( $user->trusts, Auth::user()->adminroles ) ) : $request->trusts;
        $user->save();

        return redirect('/user')->with('success', "User $user->name updated");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/user')->with('success', "User $user->name deleted!");
    }
}

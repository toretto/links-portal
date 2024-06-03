<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function _construct() {
        $this->middleware('auth');
    }

    function create() {

  
        return view('admin.users.create');
  
    }

    function store(Request $request): RedirectResponse 
    
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => ['required', 'confirmed', Password::min(12)->mixedCase()->numbers()->symbols()],
        ]);
            
        $user = new User;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        $id = $user->id;
        $role = new \App\Models\UserRoles;
        $role->user_id = $id;
        
        switch ($request->input('role')) {
            case 'administrator':
                $role->role = 'administrator';
                $role->is_admin = true;
                $role->is_editor = true;
                $role->is_user = true;
                $role->is_guest = false;
                break;
            case 'editor':
                $role->role = 'editor';
                $role->is_admin = false;
                $role->is_editor = true;
                $role->is_user = true;
                $role->is_guest = false;
                break;
            case 'user':
                $role->role = 'user';
                $role->is_admin = false;
                $role->is_editor = false;
                $role->is_user = true;
                $role->is_guest = false;
                break;
            case ('guest'):
                $role->role = 'guest';
                $role->is_admin = false;
                $role->is_editor = false;
                $role->is_user = false;
                $role->is_guest = true;
                break;
            default:
                $role->role = 'guest';
                $role->is_admin = false;
                $role->is_editor = false;
                $role->is_user = false;
                $role->is_guest = false;
                break;
        }
        $role->save();

        return redirect('admin/users')
            ->with('success', 'User created successfully');
    }

    function index() {

        $success = Session::get('success');
        $error = Session::get('error');
        $users = User::all();

        return view('admin.users.index')->with('users',$users)
            ->with('success',$success)
            ->with('error',$error);
    }

    function show(User $user) {


        return view('admin.users.user')->with('user',$user);
}
    function edit(User $user) {

        
        return view('admin.users.edit')
            ->with('user',$user);
    }

    function update(Request $request, User $user)

    {
        $user = User::find($user->id);
        $updatemail = ($request->email != $user->email) ? true : false;
    //    return $user->email;

        if ($request->filled('password')) {
            if ($updatemail == true) {
                $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => ['required', 'confirmed', Password::min(12)->mixedCase()->numbers()->symbols()],
                ]);
                }
                else {
                    $validated = $request->validate([
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255',
                    'password' => ['required', 'confirmed', Password::min(12)->mixedCase()->numbers()->symbols()],
                    ]);
                }
                $user->password = Hash::make($validated['password']);
        }

        else {
            if($updatemail == true)

            {
                $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users|max:255',
                ]);
            }

            else {
                $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|max:255',
                ]);
            }
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        $user->save();

        $id = $user->id;
        // return $id;
        // $role = new \App\Models\UserRoles;
        $user->role->user_id = $id;
        
        switch ($request->input('role')) {
            case 'administrator':
                $user->role->role = 'administrator';
                $user->role->is_admin = true;
                $user->role->is_editor = true;
                $user->role->is_user = true;
                $user->role->is_guest = false;
                break;
            case 'editor':
                $user->role->role = 'editor';
                $user->role->is_admin = false;
                $user->role->is_editor = true;
                $user->role->is_user = true;
                $user->role->is_guest = false;
                break;
            case 'user':
                $user->role->role = 'user';
                $user->role->is_admin = false;
                $user->role->is_editor = false;
                $user->role->is_user = true;
                $user->role->is_guest = false;
                break;
            case ('guest'):
                $user->role->role = 'guest';
                $user->role->is_admin = false;
                $user->role->is_editor = false;
                $user->role->is_user = false;
                $user->role->is_guest = true;
                break;
            default:
                $user->role->role = 'guest';
                $user->role->is_admin = false;
                $user->role->is_editor = false;
                $user->role->is_user = false;
                $user->role->is_guest = false;
                break;
        }
        $user->role->save();

        $crumb = Crumbs::where('name','admin_users_edit')->first();

        return redirect('admin/users')
            ->with('success', 'User updated successfully');      
    }

    function destroy(User $user) {
        $user->delete();
        return redirect('admin/users')
            ->with('success', 'User deleted successfully');
    }

    function disablemfa (Request $request) {

        $role = Auth::user()->role->is_admin;
        if ($role == "1") {
            $user = User::find($request->id);
            $user->two_factor_secret = null;
            $user->two_factor_recovery_codes = null;
            $user->two_factor_confirmed_at = null;
            $user->save();

            $success = session('success', 'MFA disabled successfully');
            return redirect('admin/users')
                ->with('success', $success);
        }
        else {
            $error = session('error', 'You do not have permission to disable MFA');
            return redirect('admin/users')
                ->with('error', $error);
        }
    }
}
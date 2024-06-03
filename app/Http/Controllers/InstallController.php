<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SettingController;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\UserRoles;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\ProjectController;
use App\Models\Setting;

class InstallController extends Controller
{
    function index() {

        // Check if setup is complete
        $run = new SettingController();
        $value = $run->setupcomplete();

        if ($value == 'true') {
            return view('install.setupcomplete');
        } else {
            return view('install.install');
        }

    }

    function store(Request $request) {

        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::min(12)->mixedCase()->numbers()->symbols()],
        ]);

        $createuser = new User();
        $createuser->name = $request->input('name');
        $createuser->email = $request->input('email');
        $createuser->password = Hash::make($request->input('password'));
        $createuser->save();
        $id = $createuser->id;

        $role = new UserRoles();
        $role->user_id = $id;
        $role->is_admin = '1';
        $role->is_editor = '1';
        $role->is_user = '1';
        $role->role = "administrator";
        $role->save();

        $setting = Setting::where('name','setupcomplete')->first();
        $setting->value = 'true';
        $setting->save();
        return view('general.setup.complete');}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SettingController;

class HomeController extends Controller
{
    public function setup()
    {
        // Check if user is authenticated
        if (auth()->check()) {
            // If user is authenticated, redirect to dashboard
            return view ('general.home');
        }
        // If user is not authenticated, run Settings Controller

        $setup = new SettingController;
        $result = $setup->setupcomplete();

        if ($result == 'true') {
            // If setup is complete, redirect to login
            return view ('auth.login');
        } else {
            // If setup is not complete, redirect to setup
            return view ('general.setup.run');
        }
    }

    public function index()
    {
        return view('general.home');
    }
}

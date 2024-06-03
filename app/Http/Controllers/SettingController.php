<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function setupcomplete() {

        // Check if setup is complete
        $checksetting = Setting::firstOrCreate(['name' => 'setupcomplete'], ['value' => 'false']);
        $value = $checksetting->value;

        return ($value);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiteSettingsController extends Controller
{

    public function showDashboard()
    {
        return view('main_panel');
    }
}
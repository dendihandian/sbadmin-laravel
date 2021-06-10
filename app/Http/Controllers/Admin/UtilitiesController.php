<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UtilitiesController extends Controller
{
    // REST API
    public function sidebarToggler()
    {
        $sidebarToggled = Session::get('sidebar-toggled', true);
        Session::put('sidebar-toggled', !$sidebarToggled);
        return response(['sidebar-toggled' => Session::get('sidebar-toggled')], 200);
    }
}

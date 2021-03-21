<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminHomeController extends AdminBaseController
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}

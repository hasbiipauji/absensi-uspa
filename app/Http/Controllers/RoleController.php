<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function check_role()
    {
        // if (auth()->user()->role != true) {
        //     dd(auth()->user()->role);
        // }
        return redirect('/dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //Search function DD
        if (request()->query('query')) {
            dd(request()->query('query'));
        }

        return view('dashboard');
    }
}

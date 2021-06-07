<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class DashboardController extends Controller
{
    public function index()
    {

        $search = request()->query('search');

        if ($search) {
            $docs = Document::where('title', 'LIKE', "%{$search}%");
        }



        return view('dashboard');
    }
}

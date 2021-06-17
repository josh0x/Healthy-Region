<?php

namespace App\Http\Controllers;

use Response;

use App\Models\Dashboard;
use App\Models\Document;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $docs = Document::latest()->orderBy('created_at')->take(5)->get();
        return view('dashboards.index', compact('docs'));

    }

    /**
     *
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Dashboard $dashboard
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * @param Dashboard $dashboard
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * @param Request $request
     * @param Dashboard $dashboard
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * @param Dashboard $dashboard
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }

    public function search(){
        $searchquery = $_GET['query'];
        $docs = Document::where('title', 'LIKE', '%'.$searchquery.'%')->get();

        return view('dashboards.search', compact('docs'));
    }
}

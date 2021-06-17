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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function search(Request $request){
        $searchquery = $request['title'];

        $this->validateSearch($request);
        $docs = Document::where('title', 'LIKE', '%'.$searchquery.'%')->get();
        return view('dashboards.search', compact('docs'));
    }


    /**
     * @return array
     */
    protected function validateSearch(): array
    {
        return request()->validate([
            'title' => 'required'
        ]);
    }
}

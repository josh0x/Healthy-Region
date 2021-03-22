<?php

namespace App\Http\Controllers;

use App\Models\Researcher;
use Illuminate\Http\Request;

class ResearcherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researcher = Researcher::latest()->get();

        return view('researchers.index', ['researchers' => $researcher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('researchers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Researcher $researcher,Request $request)
    {
        $researcher->create($this->validateResearcher($request));
        return redirect(route('researcher.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Researcher  $researcher
     * @return \Illuminate\Http\Response
     */
    public function show(Researcher $researcher)
    {
        return view('researchers.show' , ['researcher' => $researcher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Researcher  $researcher
     * @return \Illuminate\Http\Response
     */
    public function edit(Researcher $researcher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Researcher  $researcher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Researcher $researcher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Researcher  $researcher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Researcher $researcher)
    {
        //
    }

    protected function validateResearcher ($request) {
        return $request->validate([
            'name'=>'required',
            'job'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'experience'=>'required'
        ]);
    }
}

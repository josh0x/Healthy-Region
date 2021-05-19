<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Project;


class DocumentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $document = Document::latest(10)->get();
        $docs = Document::get();
        $users = User::get();

        return view('documents.index', ['docs' => $docs], ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::get();
        $projects = Project::get();

        return view('documents.create' , ['users' => $users], ['projects' => $projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $document = Document::create($this->validateDocument($request));
        $document->user()->associate(User::find($request->user_id));
        $document->project()->associate(Project::find($request->project_id));
        $document->save();
        return  redirect('documents');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('documents.show', ['document' => $document]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('documents.edit', ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $document->update($this->validateDocument());

        return redirect($document->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect(route('documents.index'));
    }

    public function download($file)
    {
        //    code
    }


     /**
     * @return array
     */
    protected function validateDocument(): array
    {
        return request()->validate([
            'title' => 'required | string | min:5',
            'excerpt' => 'required | string | min:5',
            'user_id'=>'required',
            'type' => 'nullable'
        ]);
    }
}

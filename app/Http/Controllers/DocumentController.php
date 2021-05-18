<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\user;

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
        return view('documents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Document $document,Request $request)
    {
        $document->create($this->validateDocument($request));

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
            'title' => 'required',
            'excerpt' => 'required',
            'type' => 'nullable'
        ]);
    }

    public function search (Request $request){

        //Send an empty variable to the view, unless the if logic below changes, then it'll send a proper variable to the view.
        $results = null;

        //Runs only if the search has something in it.
        if (!empty($request->title)) {
            $results = Property::all()->where('some search here')->get();
        }
        return view('documents/show.blade.php')->with('results', $results);
    }
}

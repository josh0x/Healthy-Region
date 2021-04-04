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
    public function store(Request $request)
    {
        $document = new Document();

        $document->title = request ('title');
        $document->excerpt = request ('excerpt');
        $document->type = request ('type');
        $document->file = $request->file('file')->store('');
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
        $document->update($this->validatePost());

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
        try {
            $document->delete();
        } catch (\Exception $e) {
        }
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
}

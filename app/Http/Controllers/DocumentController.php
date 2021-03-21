<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::latest()->get();

        return view('documents.index', ['documents' => $document]);
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
    public function store( Request $request)
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
     */
    public function download($file)
    {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() .'/file/'. $file;
        if (file_exists($file_path))
        {
            // Send Download
            return Response::download($file_path, $file, [
                'Content-Length: '. filesize($file_path)
            ]);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return view('documents.show' , ['document' => $document]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }


    protected function validateDoc ($request) {
        return $request->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'type'=>'nullable',

        ]);
    }
}

<?php

namespace App\Http\Controllers;
use Response;
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
        if($request->file()) {
            $name = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('files', $name, 'public');
            $document->file = $name;
            $document->save();

            return redirect('documents')
                ->with('success','The document has uploaded to the database.')
                ->with('file', $name);
        }
        else {
            $document->save();
        }
        return  redirect('documents')->with('success', 'The document uploaded to the database.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        // $document = Document::get();
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
        $users = User::get();
        $projects = Project::get();
        return view('documents.edit',
            [
                'document' => $document,
                'projects' => $projects,
                'users' => $users
            ]);
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
        $document->update($this->validateDocument($request));
        $document->user()->associate(User::find($request->user_id));
        $document->project()->associate(Project::find($request->project_id));
        if($request->file()) {
            $name = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('files', $name, 'public');
            $document->file = $name;
            $document->save();

            return redirect('documents')
                ->with('success','The document has uploaded to the database.')
                ->with('file', $name);
        }
        else {
            $document->save();
        }
        return redirect($document->path())->with('success','The document has uploaded to the database.');
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

    public function download($fileName)
    {
        $file_path =  base_path().'/storage/app/public/files/'.$fileName;
        return Response::download($file_path);
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
            'type' => 'nullable',
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
        ]);
    }
}

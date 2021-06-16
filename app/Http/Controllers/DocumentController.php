<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Response;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\Permission;

class DocumentController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $docs = Document::get();
        $users = User::get();

        return view('documents.index', [
            'docs' => $docs,
            'users' => $users
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('user_access'), \Illuminate\Http\Response::HTTP_FORBIDDEN, '403 Forbidden');
        $users = User::get();
        $projects = Project::get();

        return view('documents.create' , [
            'users' => $users,
            'projects' => $projects
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('user_access'), \Illuminate\Http\Response::HTTP_FORBIDDEN, '403 Forbidden');
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
     * @param Document $document
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Document $document)
    {

        return view('documents.show', [
            'document' => $document
        ]);
    }

    /**
     * @param Document $document
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Document $document)
    {
        abort_if(Gate::denies('user_access'), \Illuminate\Http\Response::HTTP_FORBIDDEN, '403 Forbidden');
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
     * @param Request $request
     * @param Document $document
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Document $document)
    {
        abort_if(Gate::denies('user_access'), \Illuminate\Http\Response::HTTP_FORBIDDEN, '403 Forbidden');
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
     * @param Document $document
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Document $document)
    {
        abort_if(Gate::denies('user_access'), \Illuminate\Http\Response::HTTP_FORBIDDEN, '403 Forbidden');
        $document->delete();
        return redirect(route('documents.index'));
    }

    /**
     * @param $fileName
     * @return mixed
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function search (Request $request)
    {
        //Send an empty variable to the view, unless the if logic below changes, then it'll send a proper variable to the view.
        $results = null;

        //Runs only if the search has something in it.
        if (!empty($request->title)) {
            $results = Property::all()->where('some search here')->get();
        }
        return view('documents/show.blade.php')->with('results', $results);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $document = Document::latest(10)->get();
        $projects = Project::get();

        return view('projects.index', ['users' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();

        $project->title = request ('title');
        $project->excerpt = request ('excerpt');
        $project->type = request ('type');
        $project->file = $request->file('file')->store('');
        $project->save();

        return  redirect('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->update($this->validateProject());

        return redirect($project->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        try {
            $project->delete();
        } catch (\Exception $e) {
        }
        return redirect(route('projects.index'));
    }

    public function download($file)
    {
        //    code
    }

     /**
     * @return array
     */
    protected function validateProject(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'type' => 'nullable'
        ]);
    }
}

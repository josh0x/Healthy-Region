<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable  = ['name','overview'];

    public function proejectFactory()
    {
        $projects = Project::factory()->count(3)->make();
    }

    public function path()
    {
        return route('projects.show', $this);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // select * from researcher where document_id =
    }

    public function documents()
    {
    return $this->hasMany(Document::class); // Selecet * from documents where researcher_id = (current_id)
    }

}

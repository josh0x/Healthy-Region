<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function proejectFactory()
    {
        $projects = Project::factory()->count(3)->make();
    }

    public function user()
    {
        return $this->belongsTo(User::class); // select * from researcher where document_id =
    }

    public function documents()
    {
    return $this->hasMany(Document::class); // Selecet * from documents where researcher_id = (current_id)
    }

    protected $fillable = [
        'id', 'title', 'excerpt', 'type', 'file'
    ];
}

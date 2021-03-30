<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Document;


class Researcher extends Model
{
    use HasFactory;
    protected $guarded=[];

public function documents()
{
    return $this->hasMany(Document::class); // Selecet * from documents where researcher_id = (current_id)

}
};

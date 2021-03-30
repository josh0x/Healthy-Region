<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Document extends Model
{
    use HasFactory;
    use Searchable;
    protected $guarded=[];

    public function documentFactory()
    {
        $documents = Document::factory()->count(100)->make();
    }

    public function researcher()
    {
        return $this->belongsTo(Researcher::class); // select * from researcher where document_id =
    }

    protected $fillable = [
        'id', 'title', 'excerpt', 'body', 'type'
    ];
}

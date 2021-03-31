<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function documentFactory()
    {
        $documents = Document::factory()->count(3)->make();
    }

    public function user()
    {
        return $this->belongsTo(User::class); // select * from researcher where document_id =
    }

    protected $fillable = [
        'id', 'title', 'excerpt', 'type', 'file'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class Document extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function path()
    {
        return route('documents.show', $this);
    }

    function user()
    {
        return $this->belongsTo(User::class); // select * from researcher where document_id =
    }

    public function project()
    {
        return $this->belongsTo(project::class); // select * from researcher where document_id =
    }
    function dashboard()
    {
        return $this->belongsTo(Dashboard::class); // select * from researcher where document_id =
    }


    protected $fillable = [
        'id', 'title', 'excerpt', 'type', 'file'
    ];

}

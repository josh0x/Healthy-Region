<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Block\Element\Document;

class Dashboard extends Model
{
    use HasFactory;

    function documents()
    {
        return $this->hasMany(Document::class); // select * from researcher where document_id =
    }
}

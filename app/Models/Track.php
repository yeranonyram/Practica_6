<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;

class Track extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'path',
    ];

    public function getUrl(){
        return Storage::url($this->path);
    }
}

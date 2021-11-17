<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public function blogs(){
        return $this->hasMany(Author::class);
    }
}

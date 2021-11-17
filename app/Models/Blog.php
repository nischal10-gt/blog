<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}

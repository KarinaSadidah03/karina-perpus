<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarinaBookTag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function books()
    {
        return $this->belongsToMany(KarinaBook::class, 'karina_book_tag_book', 'tag_id', 'book_id');
    }
}

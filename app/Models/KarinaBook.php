<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KarinaBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cover_image',
        'file_pdf',
        'category_id',
        'description',
    ];

    // Relasi ke kategori buku
    public function category()
    {
        return $this->belongsTo(KarinaCategory::class, 'category_id');
    }

    // Relasi ke review buku
    public function reviews()
    {
        return $this->hasMany(KarinaReview::class, 'book_id');
    }

    // Relasi ke tag buku (many to many)
    public function tags()
    {
        return $this->belongsToMany(KarinaBookTag::class, 'karina_book_tag_book', 'book_id', 'tag_id');
    }

    // Relasi ke peminjaman
    public function borrows()
    {
        return $this->hasMany(KarinaBorrow::class, 'book_id');
    }
}

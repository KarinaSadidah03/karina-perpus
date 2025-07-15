<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KarinaReview extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'content', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(KarinaBook::class, 'book_id');
    }
}

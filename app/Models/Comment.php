<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'comment', 'post_id', 'type'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

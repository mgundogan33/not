<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'desc','type'
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}

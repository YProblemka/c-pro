<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_Img extends Model
{
    use HasFactory;

    protected $fillable = [
        'img_src'
    ];
}

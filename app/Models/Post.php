<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date'
    ];

    public function imgs(): Collection
    {
        return $this->hasMany(Post_Img::class)->getResults();
    }

    public static function getById($id): \Illuminate\Database\Eloquent\Builder|Post
    {
        return static::query()->where('id', $id)->firstOrNew();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'img_src'
    ];

    public static function getById($id): \Illuminate\Database\Eloquent\Builder|OurWork
    {
        return static::query()->where('id', $id)->firstOrNew();
    }
}

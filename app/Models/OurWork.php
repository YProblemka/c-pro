<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class OurWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'img_src'
    ];

    /**
     * The photo is saved on the disk. Return src.
     *
     * @param UploadedFile|string $img
     * @return string
     */
    public static function saveImg(UploadedFile|string $img): string
    {
        return Storage::disk("img")->putFile("/", $img);
    }

    public static function getById($id): \Illuminate\Database\Eloquent\Builder|OurWork
    {
        return static::query()->where('id', $id)->firstOrNew();
    }
}

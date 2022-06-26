<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'img_src'
    ];

    protected $appends = ['img_url'];

    public function getImgUrlAttribute(): string
    {
        return Request::root() . $this->getImgSrc();
    }

    public function getImgSrc(): string
    {
        return Storage::disk("stock")->url($this->img_src);
    }

     /**
     * The photo is saved on the disk. Return src.
     *
     * @param UploadedFile|string $img
     * @return string
     */
    public static function saveImg(UploadedFile|string $img): string
    {
        return Storage::disk("stock")->putFile("/", $img);
    }
}

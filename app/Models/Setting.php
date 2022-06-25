<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value'
    ];

    public static function getByName($name): \Illuminate\Database\Eloquent\Builder|Setting
    {
        return static::query()->where('name', $name)->firstOrNew();
    }
}

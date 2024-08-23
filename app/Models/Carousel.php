<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    /**
     * The attributes that are mass assignable.
     *Test
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'background_image',
    ];
}

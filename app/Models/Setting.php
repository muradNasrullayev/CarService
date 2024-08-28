<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'mobile',
        'phone',
        'fb_url',
        'inst_url',
        'yt_url',
        'tlg_url',
        'address',
        'status'
    ];
}

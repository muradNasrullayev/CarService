<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'our_services_name',
        'icon',
        'image',
        'description_title',
        'description',
    ];
    public function advantages()
    {
        return $this->belongsToMany(Advantage::class, 'service_advantages');
    }
}

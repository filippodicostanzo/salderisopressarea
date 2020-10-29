<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';

    protected $primaryKey = 'id_code';

    protected $fillable=[
        'id_code',
        'id',
        'url',
        'name',
        'description',
        'visible',
        'order'
    ];
}

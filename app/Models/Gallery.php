<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $primaryKey = 'id_code';

    protected $fillable=[
        'id_code',
        'id',
        'name',
        'cover',
        'visible',
        'description',
        'images',
        'order'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    protected $table = 'logos';

    protected $primaryKey = 'id_code';

    protected $fillable=[
        'id_code',
        'id',
        'name',
        'image',
        'description',
        'visible',
        'order',
    ];
}

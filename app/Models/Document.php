<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $primaryKey = 'id_code';

    protected $fillable=[
        'id_code',
        'id',
        'name',
        'file',
        'description',
        'visible',
        'order',
    ];
}

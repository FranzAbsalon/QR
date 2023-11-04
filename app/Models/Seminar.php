<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;

    protected $table = 'seminar';

    protected $fillable = [
        'name',
        'start',
        'end',
        'signature_no',
        'signature1',
        'signature2',
        'template',
        'university',
        'certificate',
    ];
}

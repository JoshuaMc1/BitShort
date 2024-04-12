<?php

namespace App\Models;

use Lib\Model\Model;

class Short extends Model
{
    protected $table = 'shorts';

    protected $fillable = [
        'long_url',
        'short_code',
        'hits',
    ];
}

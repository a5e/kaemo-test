<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'title',
        'date',
        'realisator',
    ];

    public $timestamps = false;
}

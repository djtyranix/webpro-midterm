<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    protected $fillable = [
        'the_answer', 'id_question', 'id_answer'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}

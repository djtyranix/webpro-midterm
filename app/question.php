<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $fillable = [
        'title_question', 'detail_question', 'id_question'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}

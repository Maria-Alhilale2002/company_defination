<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    //
    protected $fillable = [
        'main_text',
        'next_text',
        'description_text',
        'complete_project',
        'saticfy_client',
        'exp_year',
    ];
}

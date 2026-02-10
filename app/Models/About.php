<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $table = 'abouts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'about_image',
        'vision_image',
        'vision_text',
        'about_text',
        'vision_text_en',
        'about_text_en',
    ];
}









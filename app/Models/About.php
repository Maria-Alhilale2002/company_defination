<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    //
    protected $table = 'abouts';
    protected $primaryKey = 'id';

    protected $fillable = [
        'about_image',
        'vision_image',
        'vision_text',
        'about_text',
        'story_text',
        'principle_text',
        'message_text',
        'vision_text_en',
        'about_text_en',
    ];
}









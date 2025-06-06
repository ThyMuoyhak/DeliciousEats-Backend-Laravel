<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideHero extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'description',
        'image1',
        'image2',
        'image3',
    ];
}
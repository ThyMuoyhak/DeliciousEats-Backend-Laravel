<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this line
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory; // Use the trait

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email_notifications',
        'sms_notifications',
        'dark_mode',
    ];
}

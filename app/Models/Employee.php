<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'position', 'department', 'email', 'status'];

    public function scopeSearch($query, $term)
{
    $term = "%$term%";
    
    return $query->where(function($q) use ($term) {
        $q->where('name', 'like', $term)
          ->orWhere('email', 'like', $term)
          ->orWhere('position', 'like', $term)
          ->orWhere('department', 'like', $term);
    });
}
}

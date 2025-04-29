<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'cat_id'; // Specify custom primary key
    protected $fillable = ['cat_name']; // Ensure cat_name is fillable

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'cat_id');
    }
}
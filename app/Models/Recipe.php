<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'main_image',
        'servings',
        'duration',
        'category_id',
        'ingredients',
        'steps',
        'step_images',
    ];

    protected $casts = [
        'ingredients' => 'array',
        'steps' => 'array',
        'step_images' => 'array',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'recipe_id');
    }
}

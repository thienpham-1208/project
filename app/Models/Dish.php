<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dish extends Model
{
    use SoftDeletes;

    const DISPLAY = 1;
    const NO_DISPLAY = 0;

    protected $fillable = [
        'name', 'image', 'category_id', 'slug', 'price', 'discount', 'display', 'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')->withTrashed();
    }
}

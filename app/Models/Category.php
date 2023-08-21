<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Database\Factories\TasksCategoryFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = "task_category";

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return TasksCategoryFactory::new();
    }
}

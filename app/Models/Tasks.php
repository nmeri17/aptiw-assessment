<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    public function category () {

        return $this->belongsTo(Category::class);
    }

    public function creator () {

        return $this->belongsTo(User::class, "creator_id");
    }
}

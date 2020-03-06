<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'goals', 'category_id', 'video_url', 'image_url', 'user_id'];

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function contents() {

        return $this->hasMany(Content::class);
    }

    public function buyers() {

        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function owner() {

        return $this->belongsTo(User::class, 'user_id');
    }

    public function boughtBy($id) {

        return $this->buyers()->find($id);
    }
}

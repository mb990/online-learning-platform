<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use Sluggable, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'goals', 'category_id', 'video_url', 'image_url', 'user_id'];

    public function category() {

        return $this->belongsTo(Category::class);
    }

    public function contents() {

        return $this->hasMany(Content::class);
    }

    public function followers() {

        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function owner() {

        return $this->belongsTo(User::class, 'user_id');
    }

    public function followedBy($id) {

        return $this->followers()->find($id);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}

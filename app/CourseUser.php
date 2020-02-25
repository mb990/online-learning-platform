<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    protected $fillable = ['course_id', 'user_id'];

    public function courses() {

        return $this->belongsToMany(Course::class);
    }

    public function users() {

        return $this->belongsToMany(User::class);
    }
}

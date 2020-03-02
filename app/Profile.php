<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['age', 'image_url', 'title', 'biography', 'education', 'linkedin', 'user_id'];

    public function user() {

        return $this->hasOne(User::class);
    }
}

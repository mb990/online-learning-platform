<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $fillable = ['role_id', 'user_id'];

    public function courses() {

        return $this->belongsToMany(Role::class);
    }

    public function users() {

        return $this->belongsToMany(User::class);
    }
}

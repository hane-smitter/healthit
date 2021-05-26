<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function users() {
    return $this->belongsToMany(User::class, 'role_users', 'role_id', 'user_id');
    }
}

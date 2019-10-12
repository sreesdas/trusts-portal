<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trust extends Model
{
    public function admins() {
        return $this->belongsToMany(User::class);
    }
}

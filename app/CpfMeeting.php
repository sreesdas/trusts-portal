<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpfMeeting extends Model
{
    protected $guarded = [];

    public function agendas() {
        return $this->belongsToMany(CpfAgenda::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}

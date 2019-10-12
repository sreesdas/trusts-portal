<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CpfAgenda extends Model
{
    protected $fillable = [ 'uid', 'subject', 'date' ];

    public function meetings() {
        return $this->belongsToMany(CpfMeeting::class);
    }
}

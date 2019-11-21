<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CpfAgenda extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'uid', 'subject', 'date', 'proposal' ];

    public function meetings() {
        return $this->belongsToMany(CpfMeeting::class);
    }

    public function isEditable() {
        return $this->status == 'takenup' || $this->status == 'created';
    }
}

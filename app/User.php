<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'cpf', 'email', 'password', 'designation', 'roles', 'mobile'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // protected $casts = [
    //     'trusts' => 'array',
    //     'adminroles' => 'array',
    // ];
    protected $casts = [
        'roles' => 'array',
    ];

    public function meetings() {
        return $this->belongsToMany(CpfMeeting::class);
    }

    public function isTrustee($trust) {
        
        if( $this->roles ) {
            if(in_array($trust . "-trustee", $this->roles)) {
                return true;
            }
            if(in_array('member', $this->roles)) {
                return true;
            }
        }
        return false;
    }

    public function isAdmin($trust) {

        if( $this->roles ) {
            if(in_array($trust . "-admin" , $this->roles)) {
                return true;
            }
        }
        return false;
    }
}

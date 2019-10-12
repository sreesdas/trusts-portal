<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'cpf', 'email', 'password', 'designation', 'roles', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'trusts' => 'array',
        'adminroles' => 'array',
    ];

    public function isTrustee($trust) {
        
        if( $this->trusts ) {
            if(in_array($trust, $this->trusts)) {
                return true;
            }
        }

        return false;
    }

    public function isAdmin($trust) {

        if( $this->adminroles ) {
            if(in_array($trust, $this->adminroles)) {
                return true;
            }
        }
        
        return false;
    }
}

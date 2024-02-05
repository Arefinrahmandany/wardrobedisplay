<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    use HasFactory;

    protected $guarded =[];

    // get user role

    public function roles()
    {
        return  $this -> belongsTo(Role::class,'role_id','id');
    }
}

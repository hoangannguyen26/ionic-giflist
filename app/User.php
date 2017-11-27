<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Report;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbl_user';
    
    protected $fillable = [
        'username','name', 'email', 'password', 'phone', 'address', 'contact'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isAdmin(){
        return $this->role_id == 3;
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'created_by', 'id');
    }
    public function reports()
    {
        return $this->hasMany(Report::class, 'madvi', 'username');
    }

}

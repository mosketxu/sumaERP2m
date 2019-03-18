<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


    protected static function boot()
    {
        parent::boot();
        static::creating(function (User $user) {
            if (!\App::runningInConsole()) {
                $user->slug = str_slug($user->name . " " . $user->last_name, "-");
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'estado'
    ];

    public function getAdminAttribute()
    {
        return $this->role_id == '1';
    }

    public function isAdmin()
    {
        return $this->role_id == '1';
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pathAttachment()
    {
        return "/images/users/" . $this->picture;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function userempresa()
    {
        return $this->hasMany(UserEmpresa::class);
    }
    public function getImagenUrlAttribute()
    {
        return $this->avatar ? 'storage/img/avatar/' . $this->avatar : '1_avatar1546376253.jpg';
    }
}

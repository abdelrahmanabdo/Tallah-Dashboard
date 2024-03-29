<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use Notifiable, HasApiTokens;

    protected $with = 'profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'role_id',
      'email',
      'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
      return $this->hasOne(\App\Models\UserProfile::class);
    }

    public function stylist()
    {
      return $this->hasOne(\App\Models\Stylist::class);
    }
    
    public function userRole()
    {
      return $this->belongsTo(\App\Models\UserRole::class, 'role_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stylist_id',
        'user_id',
        'active',
    ];


    public function stylist()
    {
        return $this->belongsTo(\App\Models\Stylist::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function messages()
    {
        return $this->hasMany(\App\Models\Message::class);
    }
}

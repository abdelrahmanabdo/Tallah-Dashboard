<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StylistBankAccount extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stylist_id',
        'name',
        'account_number',
        'iban',
        'swift_code',
        'branch_name',
        'branch_address',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'stylist_id' => 'integer',
    ];


    public function stylist()
    {
        return $this->belongsTo(\App\Models\Stylist::class);
    }
}

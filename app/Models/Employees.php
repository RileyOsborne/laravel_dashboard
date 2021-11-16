<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employees extends Authenticatable
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'employee_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $guarded = [];
    
    public function setPasswordAttribute($value) 
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get the post that owns the comment.
     */
    public function companies()
    {
        return $this->belongsTo(Companies::class, 'company_id');
    }
}

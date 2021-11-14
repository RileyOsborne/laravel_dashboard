<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Employees extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'employee_id';

    protected $guarded = [];
    
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
}

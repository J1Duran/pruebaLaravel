<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    //
    protected $table = 'employees';
    protected $primarykey = 'employeeNumber';
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employeeNumber', 'lastName', 'firstname', 'extension', 'email', 'officeCode', 'reportsTo', 'jobTitle'
    ];

    /**
     * Obtener los empleados de esta entrada del
     */
    public function customers()
    {
        return $this->hasMany('App\customer');
    }

     public function employees()
    {
        return $this->hasOne('App\employee');
    }

    public function temployees()
    {
        return $this->belongsTo('App\employee');
    }

    public function offices()
    {
        return $this->belongsTo('App\office');
    }
}

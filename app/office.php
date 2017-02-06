<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class office extends Model
{
    //
    protected $table =  'offices';
    protected $primarykey = 'officeCode';
     
    public $timestamps = false;
    public $incrementing = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'officeCode', 'city', 'phone', 'addressLine1', 'addressLine2', 'state', 'country', 'postalCode', 'territoty'
    ];

    //public function comments()
    //{
      //  return $this->hasMany('App\employee');
    //}
    public function comments()
    {
        return $this->hasMany('App\employee', 'officeCode');
    }
}

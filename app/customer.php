<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $table = 'customers';
    protected $primaryKey =  'customerNumber';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customerNumber', 'customerName', 'contactLastname', 'contactFirstName', 'phone', 'adressLine1', 'adressLine2', 'city', 'state', 'postalCode', 'country', 'salesRepEmployeeNumber', 'creditLimit'
    ];

    /**
     * Obtener los comentarios de esta entrada del blog
     */
    public function orders()
    {
        return $this->hasMany('App\order');
    }

    /**
     * Obtener los comentarios de esta entrada del blog
     */
    public function payments()
    {
        return $this->hasMany('App\payment');
    }

    public function post()
    {
        return $this->belongsTo('App\employee');
    }

}

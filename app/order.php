<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    protected $primaryKey = 'orderNumber';
        public $timestamps = false;
        public $incrementing = true;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderNumber', 'orderDate', 'requiredDate', 'shippedDate', 'status', 'comments', 'customerNumber'
    ];

    /**
     * Obtener los comentarios de esta entrada del blog
     */
    public function orderdetails()
    {
        return $this->hasMany('App\orderdetail');
    }

    public function customers()
    {
        return $this->belongsTo('App\customer');
    }
}

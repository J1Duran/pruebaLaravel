<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    //

    protected $primaryKey = ['orderNumber', 'productCode'];
    public $incrementing = false;
    public $timestamps = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orderNumber', 'productCode', 'quantityOrdered', 'priceEach', 'orderLineNumber'
    ];

    public function products()
    {
        return $this->belongsTo('App\product');
    }

    public function orders()
    {
        return $this->belongsTo('App\order');
    }
}

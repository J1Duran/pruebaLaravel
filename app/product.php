<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $table = 'productlines';
    protected $primaryKey =  'productCode';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'productCode', 'productName', 'productLine', 'productScale', 'productVendor', 'productDescription', 'quantityInStock', 'buyPrice', 'MSRP'
    ];

    /**
     * Obtener los comentarios de esta entrada del blog
     */
    public function orderdetails()
    {
        return $this->hasMany('App\orderdetail');
    }

    public function productlines()
    {
        return $this->belongsTo('App\productline');
    }
}

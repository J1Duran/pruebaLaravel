<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productline extends Model
{
    //
      protected $table = 'productlines';
      protected $primaryKey =  'productLine';
      public $timestamps = false;
      public $incrementing = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['productLine', 'textDescription', 'htmlDescription', 'image'];

    public function products()
    {
        return $this->hasMany('App\product');
    }



}

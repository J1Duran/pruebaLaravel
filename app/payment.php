<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    //
    protected $table =  'payments'


      protected $primaryKey = ['customerNumber', 'checkNumber'];



     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customerNumber', 'checkNumber', 'paymentDate', 'amount'
    ];

    public function customers()
    {
        return $this->belongsTo('App\customers');
    }
}

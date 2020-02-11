<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  protected $fillable = [
      'billing_firstname','billing_lastname', 'billing_address', 'billing_state','billing_city','billing_phone','error','shipped','user_id','billing_subtotal','billing_total','billing_tax','billing_email'
  ];

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function products(){
      $this->belongsToMany('App\Product')->withPivot('quantity', 'size');
    }
}

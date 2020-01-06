<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
      'name','img', 'gender', 'price', 'description','category_id','gender_id'
  ];


  public function category ()
 {
   return $this->belongsTo(Category::class);
 }

 public function gender()
{
  return $this->belongsTo(Gender::class);
}
}

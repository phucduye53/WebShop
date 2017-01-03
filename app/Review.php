<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

	protected $table='reviews';

  public function product(){
    return $this->belongTo('App\Product');
  }

}

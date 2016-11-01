<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  

  public static function valid() {

    return array(

      'content' => 'required'

     );

  }



    protected $fillable = [

      'title', 'content','publish'

    ];



public function comments() {

    return $this->hasMany('App\Comment', 'article_id');

  }


}
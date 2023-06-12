<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','lastname'];
    public function books(){
        return $this->hasMany('App\Book');
     }
}

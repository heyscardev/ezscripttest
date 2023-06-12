<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookInventory extends Model
{
    protected $fillable = ['book_id', 'total_inventory', 'available_inventory'];

    public function book()
    {
        return $this->belongsTo('App\Book');
    }
    public function getLoanBooksAttribute()
    {
        return $this->total_inventory  - $this->available_inventory;
    }
}

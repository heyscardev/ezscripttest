<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'author_id'];

    public function author()
    {
        return $this->belongsTo('App\Author');
    }
    public function bookInventory()
    {
        return $this->hasOne('App\BookInventory');
    }
    public function loans()
    {
        return $this->hasMany('App\Loan');
    }
    public function getThereAreAvailablesAttribute()
    {
        return $this->bookInventory->available_inventory > 0;
    }
    public function scopeAvailables($query)
    {
        return $query->whereHas("bookInventory", function ($query2) {
            $query2->where("available_inventory", ">", 0);
        });
    }
}

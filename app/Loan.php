<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['partner_id', 'book_id', 'delivered'];
    public function partner()
    {
        return $this->belongsTo('App\Partner');
    }
    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function scopeNotDelivered($query)
    {
        return $query->where('delivered', false);
    }
    public function scopeDelivered($query)
    {
        return $query->where('delivered', true);
    }

}

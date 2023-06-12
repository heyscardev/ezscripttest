<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'inventory_limit',
        'active',
    ];
    public function loans()
    {
        return $this->hasMany('App\Loan');
    }
    public function getAvailableBooksAttribute()
    {
        if ($this->inventory_limit == 0) {
            return 'unlimited';
        }
        return $this->inventory_limit -
            $this->loans()
            ->notDelivered()
            ->count();
    }
    public function getLoanBooksAttribute()
    {
        return $this->loans()
            ->notDelivered()
            ->count();
    }
    public function scopeCanDoLoan($query)
    {
        return $query
            ->withCount([
                'loans' => function ($query2) {
                    $query2->notDelivered();
                },
            ])
            ->havingRaw('loans_count < partners.inventory_limit')
            ->orHavingRaw('partners.inventory_limit = 0');
    }
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}

<?php

namespace App\Rules;

use App\Partner;
use Illuminate\Contracts\Validation\Rule;

class PartnerCanBorrow implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $partner = Partner::find($value);
        if ($partner) {
            if($partner->limt_inventory == 0 )return true;
            return $partner->available_books > 0;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'this partner cann\'t carry more books! ';
    }
}

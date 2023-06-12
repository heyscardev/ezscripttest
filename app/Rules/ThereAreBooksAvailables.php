<?php

namespace App\Rules;

use App\Book;
use Illuminate\Contracts\Validation\Rule;

class ThereAreBooksAvailables implements Rule
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
        $book = Book::find($value);
        if ($book) {
            return $book->there_are_availables ;
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
        return 'This book hasn\'t copies available';
    }
}

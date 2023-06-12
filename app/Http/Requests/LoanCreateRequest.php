<?php

namespace App\Http\Requests;

use App\Rules\PartnerCanBorrow;
use App\Rules\PartnerIsActive;
use App\Rules\ThereAreBooksAvailables;
use Illuminate\Foundation\Http\FormRequest;

class LoanCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "partner"=>["required","exists:partners,id",new PartnerIsActive,new PartnerCanBorrow],
            "book"=>["required","exists:books,id",new ThereAreBooksAvailables],
            "delivered"=>["boolean"],
        ];
    }
}

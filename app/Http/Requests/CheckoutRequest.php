<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
return Auth::check();    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {


      return [

          'firstname' => ' required',
          'lastname' => ' required',
          'email' => ' required',
          'address' => ' required',
          'city' => ' required',
          'state' => ' required',
          'phone' => ' required',
      ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MembersRequest extends FormRequest
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
            'lastName'        => 'required|max:50',
            'firstName'       => 'required|max:50',
            'gender'          => 'required',
                                  Rule::in(['1', '2']),
            'pref'            => 'required|max:5',
                                  Rule::in(config('prefs')),
                                
            'address'         => 'required|max:100',
            'grpName'         => 'nullable|exists:groups,name'
        ];
    }
}

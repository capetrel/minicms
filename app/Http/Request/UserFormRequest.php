<?php
namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        // rules for pages form
        return [
            'email' => 'required|email',
            'name' => 'required|min:2',
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
        ];
    }
}

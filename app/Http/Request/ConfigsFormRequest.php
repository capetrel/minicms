<?php
namespace App\Http\Request;

use App\Rules\IsSlug;
use Illuminate\Foundation\Http\FormRequest;

class ConfigsFormRequest extends FormRequest
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
        // rules for config form
        return [
            'site_name' => 'required',
            'site_slogan' => 'required',
            'site_url' => 'required',
            'site_keywords' => 'required',
            'site_description' => 'required',
        ];
    }

}

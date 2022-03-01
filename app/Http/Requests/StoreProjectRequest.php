<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required |max:150',
            'main_image' => 'nullable |image |mimes:png,jpg',
            'client_id' => 'required |exists:clients,id',
            'service_id' => 'required |exists:services,id',
            'gallery' => 'nullable |array ',
            'during_date' => 'nullable |date'
        ];
    }
}

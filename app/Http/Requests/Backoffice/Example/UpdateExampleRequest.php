<?php

namespace App\Http\Requests\Backoffice\Example;

use App\Rules\FileUpdate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExampleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['nullable'],
            'name' => ['required'],
            'job' => ['required'],
            'age' => ['required', 'numeric'],
            'oldImage' => ['required'],
            'image' => ['required_without:oldImage', new FileUpdate(['image']), 'max:1024'],
            'address' => ['required'],
        ];
    }
}

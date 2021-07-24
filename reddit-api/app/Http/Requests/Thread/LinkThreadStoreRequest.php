<?php

namespace App\Http\Requests\Thread;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LinkThreadStoreRequest extends FormRequest
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
            'title' => ['required', 'min:10', 'max:250'],
            'url' => ['required', 'url'],
            'attachment' => ['nullable', 'url'],
            'attachment_type' => ['nullable', Rule::in(['IMAGE', 'VIDEO'])]
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'fileToUpload' => [
                'required',
                'mimes:csv,xml,xls,xlsx'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'fileToUpload.required' => 'File is required',
            'fileToUpload.mimes' => 'Choose supported file type.',
        ];
    }

}

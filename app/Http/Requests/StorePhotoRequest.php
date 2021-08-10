<?php

namespace App\Http\Requests;

use App\Models\Photo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePhotoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('photo_create');
    }

    public function rules()
    {
        return [
            'alt_text'     => [
                'string',
                'required',
            ],
            'gallery_type' => [
                'required',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBlogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('blog_create');
    }

    public function rules()
    {
        return [
            'title'         => [
                'string',
                'required',
            ],
            'slug'          => [
                'string',
                'required',
            ],
            'description'   => [
                'required',
            ],
            'feature_image' => [
                'required',
            ],
        ];
    }
}

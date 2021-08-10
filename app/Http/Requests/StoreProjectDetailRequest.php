<?php

namespace App\Http\Requests;

use App\Models\ProjectDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_detail_create');
    }

    public function rules()
    {
        return [
            'client_name' => [
                'string',
                'required',
            ],
            'location'    => [
                'string',
                'required',
            ],
            'year'        => [
                'string',
                'nullable',
            ],
            'photos.*'    => [
                'required',
            ],
        ];
    }
}

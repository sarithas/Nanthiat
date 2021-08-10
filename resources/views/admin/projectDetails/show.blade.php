@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.projectDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.project-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.projectDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $projectDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectDetail.fields.client_name') }}
                        </th>
                        <td>
                            {{ $projectDetail->client_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectDetail.fields.location') }}
                        </th>
                        <td>
                            {{ $projectDetail->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectDetail.fields.year') }}
                        </th>
                        <td>
                            {{ $projectDetail->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectDetail.fields.photos') }}
                        </th>
                        <td>
                            @foreach($projectDetail->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projectDetail.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\ProjectDetail::TYPE_SELECT[$projectDetail->type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.project-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreProjectDetailRequest;
use App\Http\Requests\UpdateProjectDetailRequest;
use App\Http\Resources\Admin\ProjectDetailResource;
use App\Models\ProjectDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectDetailsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('project_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectDetailResource(ProjectDetail::all());
    }

    public function store(StoreProjectDetailRequest $request)
    {
        $projectDetail = ProjectDetail::create($request->all());

        if ($request->input('photos', false)) {
            $projectDetail->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
        }

        return (new ProjectDetailResource($projectDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ProjectDetail $projectDetail)
    {
        abort_if(Gate::denies('project_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectDetailResource($projectDetail);
    }

    public function update(UpdateProjectDetailRequest $request, ProjectDetail $projectDetail)
    {
        $projectDetail->update($request->all());

        if ($request->input('photos', false)) {
            if (!$projectDetail->photos || $request->input('photos') !== $projectDetail->photos->file_name) {
                if ($projectDetail->photos) {
                    $projectDetail->photos->delete();
                }

                $projectDetail->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
            }
        } elseif ($projectDetail->photos) {
            $projectDetail->photos->delete();
        }

        return (new ProjectDetailResource($projectDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ProjectDetail $projectDetail)
    {
        abort_if(Gate::denies('project_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

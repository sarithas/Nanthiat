<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProjectDetailRequest;
use App\Http\Requests\StoreProjectDetailRequest;
use App\Http\Requests\UpdateProjectDetailRequest;
use App\Models\ProjectDetail;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ProjectDetailsController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('project_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ProjectDetail::query()->select(sprintf('%s.*', (new ProjectDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'project_detail_show';
                $editGate      = 'project_detail_edit';
                $deleteGate    = 'project_detail_delete';
                $crudRoutePart = 'project-details';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('client_name', function ($row) {
                return $row->client_name ? $row->client_name : "";
            });
            $table->editColumn('location', function ($row) {
                return $row->location ? $row->location : "";
            });
            $table->editColumn('year', function ($row) {
                return $row->year ? $row->year : "";
            });
            $table->editColumn('photos', function ($row) {
                if (!$row->photos) {
                    return '';
                }

                $links = [];

                foreach ($row->photos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? ProjectDetail::TYPE_SELECT[$row->type] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photos']);

            return $table->make(true);
        }

        return view('admin.projectDetails.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projectDetails.create');
    }

    public function store(StoreProjectDetailRequest $request)
    {
        $projectDetail = ProjectDetail::create($request->all());

        foreach ($request->input('photos', []) as $file) {
            $projectDetail->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $projectDetail->id]);
        }

        return redirect()->route('admin.project-details.index');
    }

    public function edit(ProjectDetail $projectDetail)
    {
        abort_if(Gate::denies('project_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projectDetails.edit', compact('projectDetail'));
    }

    public function update(UpdateProjectDetailRequest $request, ProjectDetail $projectDetail)
    {
        $projectDetail->update($request->all());

        if (count($projectDetail->photos) > 0) {
            foreach ($projectDetail->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $projectDetail->photos->pluck('file_name')->toArray();

        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $projectDetail->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.project-details.index');
    }

    public function show(ProjectDetail $projectDetail)
    {
        abort_if(Gate::denies('project_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.projectDetails.show', compact('projectDetail'));
    }

    public function destroy(ProjectDetail $projectDetail)
    {
        abort_if(Gate::denies('project_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyProjectDetailRequest $request)
    {
        ProjectDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('project_detail_create') && Gate::denies('project_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ProjectDetail();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}

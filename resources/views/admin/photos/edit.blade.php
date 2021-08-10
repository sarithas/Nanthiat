@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.photo.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.photos.update", [$photo->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="alt_text">{{ trans('cruds.photo.fields.alt_text') }}</label>
                <input class="form-control {{ $errors->has('alt_text') ? 'is-invalid' : '' }}" type="text" name="alt_text" id="alt_text" value="{{ old('alt_text', $photo->alt_text) }}" required>
                @if($errors->has('alt_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alt_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.photo.fields.alt_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.photo.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.photo.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.photo.fields.gallery_type') }}</label>
                <select class="form-control {{ $errors->has('gallery_type') ? 'is-invalid' : '' }}" name="gallery_type" id="gallery_type" required>
                    <option value disabled {{ old('gallery_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Photo::GALLERY_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gallery_type', $photo->gallery_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gallery_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.photo.fields.gallery_type_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.photos.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($photo) && $photo->image)
      var file = {!! json_encode($photo->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
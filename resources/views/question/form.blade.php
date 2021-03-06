@extends('layouts.master')

@push('script-head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tulis Pertanyaan</h3>
    </div>
    <div class="card-body">
      <form action="@if(Request::is('question/*/edit')) /question/{{ $question->id }}
      @else /question @endif" method="POST">
        @csrf
        @if (Request::is('question/*/edit'))
            @method('PUT')
        @endif
        <div class="form-group">
          <label for="title">Judul</label>
          <input type="text" class="form-control" placeholder="Tulis Judul" id="title" name="title" value="{{ $question->title ?? '' }}">
        </div>
        <div class="form-group">
          <label for="isi">Pertanyaan</label>
          <textarea name="content" class="form-control my-editor">{!! $question->content ?? '' !!}</textarea>
        </div>
        <div class="form-group">
          <label for="tags">Tag</label>
          <input type="text" class="form-control" placeholder="Tulis tag" id="tags" name="tags" value="{{ $question->tags ?? '' }}">
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
    var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
@endpush

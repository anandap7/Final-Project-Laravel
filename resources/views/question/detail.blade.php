@extends('layouts.master')

@push('script-head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
<section class="content-header">
    <h3>{{ $question->title }}</h3>
    </span>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <span class="text-sm">
                <i class="far fa-clock"></i> Dibuat pada {{ date_format(date_create($question->created_at), 'd M Y H:i') }}
            </span> &nbsp;
            <span class="text-sm">
                <i class="fas fa-history"></i> Terakhir diubah pada {{ date_format(date_create($question->updated_at), 'd M Y H:i') }}
            </span><br>
            <span class="text-sm">
                <i class="far fa-user"></i> Ditanyakan oleh {{ $question->user->name }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-1">
                    <div class="text-center">
                        <div><a href="/question/{{$question->id}}/{{$question->uploader_id}}/vote"><i class="fa fa-caret-up fa-2x text-secondary"></i></a></div>
                        <span style="font-size: 24px;">{{$total}}</span>
                        <div style="font-size: 14px;">suara</div>
                        <div>
                            @if(Auth::user()->reputation >= 15)<a href="/question/{{$question->id}}/{{$question->uploader_id}}/unvote"><i class="fa fa-caret-down fa-2x text-secondary"></i></a></div>
                            @else
                            <a href=""><i class="fa fa-caret-down fa-2x text-secondary"></i></a></div>
                            @endif
                    </div>
                </div>
                <div class="col-11" >{!!$question->content!!} <br>
                    @foreach ($QuestionComment as $key => $QuestionComment)
                        <div class="col-11">
                            <p><font size="2">Komentar {{ $QuestionComment->user->name }} : "{!! $QuestionComment->content !!}"</font></p>
                        </div>
                    @endforeach
                    <form method="post" action="/QuestionComment">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                            <label for="comment"></label>
                            <textarea class="form-control" id="comment" rows="3" placeholder="Tulis Komentar" name="content"></textarea>
                            <button type="submit" >Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        @if (count($question->answers) == 0)
        <div class="card-body text-center">
            <h5 class="text-info">Belum ada jawaban</h5>
            Jadilah yang pertama untuk menjawab
        </div>
        @else
        <div class="card-header">Jawaban</div>
        <div class="card-body">
            @foreach ($answers as $key => $answer)
                <div class="row p-1" style="border-bottom: 1px solid gray">
                    <div class="col-1">
                        <div class="text-center">
                            <div><i class="fa fa-caret-up fa-2x text-secondary"></i></div>
                            <span style="font-size: 24px;">0</span>
                            <div style="font-size: 14px;">suara</div>
                            <div><i class="fa fa-caret-down fa-2x text-secondary"></i></div>
                        </div>
                    </div>
                    <div class="col-11">
                        <p>{{ $answer->user->name }} &bull; <span class="text-secondary">{{ $answer->diff }}</span></p>
                        <p>{!! $answer->content !!}</p>
                        @if ($question->uploader_id == Auth::id())
                        <a href="">Tandai sebagai jawaban terbaik</a>
                        @endif
                        <form method="post" action="/AnswerComment">
                            @csrf
                        <div class="form-group">
                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                            <input type="hidden" name="answer_id" value="{{ $answer->id }}">
                            <label for="comment"></label>
                            <textarea class="form-control" id="comment" rows="3" placeholder="Tulis Komentar" name="content"></textarea>
                            <button type="submit">Kirim</button>
                        </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>

    <div class="text-center">
    @guest
        <a href="/login" class="btn btn-primary">Tulis Jawaban</a>
    @else
        <h5>Tulis Jawaban</h5>
        <form action="/answer" method="post">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <textarea name="content" class="form-control my-editor">{!! old('content', $content ?? '') !!}</textarea>
            <button type="submit" class="btn btn-success mt-2">Kirim</button>
        </form>
    @endguest
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

@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Pertanyaan Saya</h1>
</section>

<section class="content">
    @if (count($questions) == 0)
        <div class="h4 text-center text-info">Kamu belum pernah mengajukan pertanyaan</div>
    @else
        @foreach ($questions as $key => $question)
            <div class="row m-1 p-1" style="border-bottom: 1px solid gray">
                <div class="col-1">
                    <div class="text-center">
                        <span style="font-size: 24px;">0</span>
                        <div style="font-size: 14px;">dukungan</div>
                    </div>
                    <div class="text-center">
                        <span style="font-size: 24px;">{{ count($question->answers) }}</span>
                        <div style="font-size: 14px;">jawaban</div>
                    </div>
                </div>
                <div class="col-11">
                    <a href="/question/{{ $question->id }}">{{ $question->title }}</a>
                    <div class="float-right text-center">
                        <a href="/question/{{ $question->id }}/edit" class="btn btn-info btn-sm mb-2"><i class="fa fa-edit"></i> Edit</a>
                        <form action="/question/{{ $question->id }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin nih mau dihapus?')"><i class="far fa-trash-alt"></i> Delete</button>
                        </form>
                    </div>
                    <p>{!! $question->content !!}</p>
                </div>
            </div>
        @endforeach
    @endif
</section>
@endsection

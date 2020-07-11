@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Jawaban Saya</h1>
</section>

<section class="content">
    @if (count($answers) == 0)
        <div class="h4 text-center text-info">Kamu belum pernah menulis jawaban</div>
    @else
        @foreach ($answers as $key => $answer)
        <div class="row m-1" style="border-bottom: 1px solid gray">
            <div class="col-1">
                <div class="text-center">
                    <span style="font-size: 24px;">0</span>
                    <div style="font-size: 14px;">suara</div>
                </div>
            </div>
            <div class="col-11">
                Judul pertanyaan : <a href="/question/{{ $answer->question->id }}">{{ $answer->question->title }}</a>
                <div class="float-right text-center">
                    <a href="/answer/{{ $answer->id }}/edit" class="btn btn-info btn-sm mb-2"><i class="fa fa-edit"></i> Edit</a>
                    <form action="/answer/{{ $answer->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin nih mau dihapus?')"><i class="far fa-trash-alt"></i> Delete</button>
                    </form>
                </div>
                <br>
                <span>Jawaban kamu : {!! $answer->content !!}</span>
            </div>
        </div>
        @endforeach
    @endif
</section>
@endsection

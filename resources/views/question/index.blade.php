@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 style="display: inline;">List Pertanyaan</h1>
    <a href="/question/create" class="btn btn-primary float-right">Buat Pertanyaan</a>
</section>

<section class="content">
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
                <p>{!! $question->content !!}</p>
                <p class="text-secondary float-right">ditanyakan oleh {{ $question->user->name }}</p>
            </div>
        </div>
    @endforeach
</section>
@endsection

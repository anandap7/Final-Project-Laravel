@extends('layouts.master')

@section('content')
<section class="content"> 
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Buat Pertanyaan</h3>
    </div>
    <div class="card-body">     
      <form action= "{{url('/question')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Judul :</label>
          <input type="text" class="form-control" placeholder="Tulis Judul" id="title" name="title">
        </div>
        <div class="form-group">
          <label for="isi">Pertanyaan :</label>
          <input type="text" class="form-control" placeholder="Tulis pertanyaan" id="content" name="content">
        </div>
        <div class="form-group">
          <label for="tags">Tag :</label>
          <input type="text" class="form-control" placeholder="Tulis tag" id="tags" name="tags">
        </div> 
          <input hidden name="uploader_id" value="{{Auth::user()->id}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>  
  </div>
</section>
	
@endsection
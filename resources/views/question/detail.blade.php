@extends('layouts.master')

@section('content')

<section class="content">
  <div class="card" >
  
  	@foreach($question as $key=>$item)
    <div class="card-header">
    <h3 class="card-title">Judul : {{$item->title}}</h3>
  </div>
   <div class="card-body">
    <p class="card-text">Pertanyaan : {{$item->content}} <br><br></p>

    <p class="card-text"><font size ="2">Tanggal dibuat : {{$item->created_at}}</font></p>
    <p class="card-text"><font size ="2">Tanggal diperbarui : {{$item->updated_at}} </font><br></p>
  </div>
  <div class="card-body">
    <p class="card-text">Buat Jawaban :</p>
               <form action="{{ url ('/answer/'.$item->id)}}" method="POST" class="form-inline">
                  @csrf
                  <input hidden name="id_pertanyaan" value="{{$item->id}}">
                  <div class="form-group">
                  <label for="inputPassword2" class="sr-only">Jawaban</label>
                  <input type="text" class="form-control" placeholder="Tulis jawaban" id="content" name="content" style="width:60rem" >
                  </div>
                  <button type="submit" class="btn btn-primary" >Submit</button>                
                </form>

              
  </div>
  	@endforeach
  <ul class="list-group list-group-flush">
  	@foreach($answer as $key=>$item)
    <li class="list-group-item">Jawaban : {{$item->content}}</li>
    @endforeach
  </ul>
  <div class="card-body">
  	@foreach($question as $key=>$item)
    <form method="POST" action="/question/{{$item->id}}/edit" style="display: inline">
    	@csrf
    	@method('GET')
    <button type="submit" class="btn btn-sm btn-success">Ubah</button>
	</form>
    
    <form method="POST" action="/question/{{$item->id}}" style="display: inline">
    	@csrf
    	@method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
	</form>
    @endforeach
  </div>

  </div>
</section>
@endsection
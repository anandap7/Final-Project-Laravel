

@extends('layouts.master')

@section('content')
<section class="content"> 
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List Pertanyaan</h3>
    </div>
    <div class="card-body">     
      <div class="container-md">
      	<table>
      		<table class="table table-dark table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
            </tr>
          </thead>
          <tbody>
          	@foreach($question as $key => $item)
            <tr>
              <td>{{$key + 1}}</td>
              <td>{{$item->title}}</td>
              <td>
                <form method="POST" action="/question/{{$item->id}}" style="display: inline">
                  @csrf
                  @method('GET')
                  <button type="submit" class="btn btn-sm btn-success">Lihat</button>
                </form>
              </td>
            </tr>
            @endforeach      
          </tbody>
        </table>
      </table>
    </div>
  </div>  
</div>
</section>
@endsection
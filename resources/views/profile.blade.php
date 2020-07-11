@extends('layouts.master')

@section('content')

<section class="content">
  <div class="card" >  	
  	<div class="card-body">
        <p class="card-text"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><font size="5">&nbsp &nbsp User Info</font></p>
        <p class="card-text"><i class="fa fa-id-card" aria-hidden="true"></i> &nbsp &nbsp {{ Auth::user()->name}} </p>
        <p class="card-text"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp &nbsp {{ Auth::user()->email}} </p>
        <p class="card-text"><i class="fa fa-trophy" aria-hidden="true"></i></i> &nbsp &nbsp {{ Auth::user()->reputation}} </p>
  </div>
 </section>

@endsection
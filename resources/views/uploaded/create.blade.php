@extends("layouts.application")

@section("content")
<div class="form">
<h1>page uploads</h1>


{{ Form::open(array('route' => 'upload.store', 'class' => 'form',  'files'=>true, 'enctype' => 'multipart/form-data','class'=>'form-horizontal')) }}



  <div class="row">

    <div class="col-md-4">

      <br/>

      {!! Form::text('deskripsi', null,array('class' => 'form-control','placeholder'=>'Add Title','required')) !!}

    </div>

    <div class="col-md-12">

      <br/>

      {!! Form::file('foto', array('class' => 'foto','required')) !!}


    </div>

    <div class="col-md-12">

      <br/>

     {!! Form::submit('Save', array('class' => 'btn btn-raised btn-primary')) !!}


    </div>

  </div>

 
{!! Form::close() !!}

{!! link_to(route('upload.index'), "Back"); !!}
</div>

@stop
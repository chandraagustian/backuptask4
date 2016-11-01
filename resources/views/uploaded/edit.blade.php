@extends("layouts.application")

@section("content")
<h3>Edit a Picture</h3>



  {!! Form::model($picture, ['route' => ['upload.update', $picture->id], 'method' => 'put', 'class' => 'form-horizontal', 'files'=>true,'role' => 'form']) !!}

    <div class="row">

    <div class="col-md-4">

      <br/>

      {!! Form::text('deskripsi', null,array('class' => 'form-control','placeholder'=>'Add Title')) !!}
      {!! $errors->first('deskripsi') !!}

    </div>

    <div class="col-md-12">

      <br/>

      {!! Form::file('foto', array('class' => 'foto')) !!}
{!! $errors->first('foto') !!}

    </div>

    <div class="col-md-12">

      <br/>

     {!! Form::submit('Save', array('class' => 'btn btn-raised btn-primary')) !!}

{!! link_to(route('upload.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!}
    </div>

  </div>


  {!! Form::close() !!}
    
@stop


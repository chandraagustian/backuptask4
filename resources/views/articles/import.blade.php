@extends("layouts.application")
@section("content")
 <div class="form">
<h1>Import a Files</h1>


{{ Form::open(array('route' => 'imports.store', 'class' => 'form',  'files'=>true, 'enctype' => 'multipart/form-data','class'=>'form-horizontal')) }}



  <div class="row">

    

      {!! Form::file('file') !!}


    </div>

    <div class="col-md-12">

      <br/>

     {!! Form::submit('Import', array('class' => 'btn btn-raised btn-primary')) !!}
{!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!}

    </div>

  </div>

 
{!! Form::close() !!}


</div>
@stop
@extends("layouts.application")

@section("content")

  <div class="row">

    <h2>{!! $pages->deskripsi !!}</h2>

    <div><img src="{!! '/upload_gambar/'. $pages->id . '/thumb_' . $pages->foto !!}" /></div>
   
</div>
  </div>

  <div>

  
  {!! Form::open(array('route' => array('upload.destroy', $pages->id), 'method' => 'delete')) !!}

 

    {!! link_to(route('upload.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!}

   {!! link_to(route('upload.edit', $pages->id), 'Edit', ['class' => 'btn btn-raised btn-warning']) !!}

   {!! Form::submit('Delete', array('class' => 'btn btn-raised btn-danger', "onclick" => "return confirm('are you sure?')")) !!}

  {!! Form::close() !!}

  </div>
<script>
function myFunction() {
    location.reload();
}
</script>
@stop
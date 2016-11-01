@extends("layouts.application")

@section("content")

 
  <h1>Photo Galery</h1> 
{!! link_to(route('upload.create'), '+add Picture'); !!}  

<div class="container">
<div class="row">
   
<div class=''>
<div id="gambar">
  @foreach($pages as $page)
  
  
 
  <div class="item">
  <p>Deskripsi:{!! $page->deskripsi !!}</p>
   <img src="{!! '/upload_gambar/'. $page->id . '/thumb_' . $page->foto !!}" />
    {!! link_to(route('upload.edit', $page->id), 'Edit', ['class' => 'btn btn-raised btn-warning']) !!}
    {!! link_to(route('upload.destroy', $page->id), 'Delete', ['class' => 'btn btn-raised btn-warning']) !!}
  </div>
  
  @endforeach
 </div>
 </div>

<div class="row">
  
</div> 
<script src="assets/js/masonry/masonry.js"></script>
<script src="assets/js/masonry/masonry.pkgd.min.js"></script>
<script src="assets/js/masonry/masonry.pkgd.js"></script>
@stop
@extends("layouts.application")

@section("content")

  <div class="row">

    <h2 class="pull-left">List Articles</h2>


    {!! link_to(view("imports.export"), "Export", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}
    {!! link_to(view("imports.import"), "Import", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}

  {!! link_to(route("articles.create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}

  </div>

  @include('articles.list')

@stop

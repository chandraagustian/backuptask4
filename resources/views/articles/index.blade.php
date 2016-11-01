  
@extends("layouts.application")

@section("content")

  <div class="row">

    <h2 class="pull-left">List Articles</h2>


    
    {!! link_to(route("imports.create"), "Import", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}

  {!! link_to(route("articles.create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}

  </div>

  @include('articles.list')

@stop
<script>

$('#search').on('click', function(){

  $.ajax({

    url : '/articles',

    type : 'GET',

    dataType : 'json',

    data : {

      'keywords' : $('#keywords').val()

    },

    success : function(data) {

      $('#articles-list').html(data['view']);

    },

    error : function(xhr, status) {

      console.log(xhr.error + " ERROR STATUS : " + status);

    },

    complete : function() {

      alreadyloading = false;

    }

  });

});

</script>
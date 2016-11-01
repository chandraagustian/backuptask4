 

  <!-- searching -->

<div class="row">

  <div class="col-md-12 search">

    <div class="col-md-6">

      <div class="input-group input-group-sm">

        <input type="text" class="form-control" id="keywords" placeholder="Keywords">

        <span class="input-group-btn">

        <button id="search" class="btn btn-info btn-flat" type="button">

          Go!

        </button>

        </span>

      </div><!-- /input-group -->

    </div>

  </div>

 </div>
  <!-- endof -->

  <div class="col-md-12">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
            <th>No</th>
            <th>title</th>
            <th>content</th>
            <th>publish</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($articles as $article)
        <tr>
        <td>{{ $article->id }}</td>
        <td>{{ $article->title }}</td>
        <td>{{ $article->content }} 

       {!! str_limit($article->content, 250) !!}

       {!! link_to(route('articles.show', $article->id), 'Read More') !!}


        </td>

       <td>{{ $article->publish }}</td>

        </tr>
        @endforeach

      
        </tbody>
        <tfoot></tfoot>
        </table>
        {!! $articles->render() !!}
</div>  
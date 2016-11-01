


<div class="form-group">

  {!! Form::label('content', 'Commentdd:', array('class' => 'col-lg-3 control-label')) !!}

  <div class="col-lg-9">

    {!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10)) !!}

    <div class="text-danger">{!! $errors->first('content') !!}</div>

  </div>


<div class="form-group">

  <div class="col-lg-3"></div>

  <div class="col-lg-9">

    {!! Form::submit('Save', array('class' => 'btn btn-raised btn-primary')) !!}

    {!! link_to(route('articles.index'), "Back", ['class' => 'btn btn-raised btn-info']) !!}

  </div>

  <div class="clear"></div>

</div>


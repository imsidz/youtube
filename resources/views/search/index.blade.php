<!DOCTYPE html>
<html>
<head>
    <title>Youtube</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
</head>
<body>
<div class="container-fluid">
    <div class="row pt-3">
        <div class="col-md-3">
             <img src="https://upload.wikimedia.org/wikipedia/commons/b/be/Lineage_OS_Logo.png" class="img-fluid col-md-6">
        </div>
        <div class="col-md-6">
            <div class="">
                {!! Form::open(['method' => 'POST', 'route' => 'search.post']) !!}
            
                    <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
                        <div class="row">
                            {!! Form::text('search', null, ['class' => 'form-control col-md-10', 'required' => 'required', 'placeholder' => 'Search']) !!}
                            <small class="text-danger">{{ $errors->first('search') }}</small>
                             {!! Form::submit("Search", ['class' => 'btn btn-success btn-sm col-md-2']) !!}
                        </div>
                        
                    </div>
                {!! Form::close() !!}
            </div>
            
        </div>
        <div class="col-md-3">
              <ul class="list-inline float-right">
                  <li class="list-inline-item">Lorem ipsum</li>
                  <li class="list-inline-item">Phasellus iaculis</li>
                  <li class="list-inline-item">Nulla volutpat</li>
                </ul>
            
        </div>
    </div>
   
</div>
  <div class="container">
    @if($nextpagetoken == !null)
   {!! Form::open(['method' => 'POST', 'route' => ['search.next', $slug]]) !!}
   
       {!! Form::hidden('next', $nextpagetoken) !!}
   
       <div class="btn-group pull-right">
           {!! Form::submit("Next", ['class' => 'btn btn-success']) !!}
       </div>
   
   {!! Form::close() !!}
   @endif
   <style type="text/css">
     .boxhead a {
          color: #000;
          text-decoration: none;
      }
   </style>
    @foreach($results as $video)
      <div class="row boxhead">
        
        <div class="col-md-4">
          <a href="{{ url('watch/' . $video->id->videoId)}}">
          <img src="{{$video->snippet->thumbnails->medium->url}}" class="img-fluid">
          </a>
        </div>
        <div class="col-md-8">
          <a href="#">
          <h1 style="font-size: 17px;">{{ $video->snippet->title }}</h1>
          <p>{{ $video->snippet->channelTitle }}</p>
          <p>{{ $video->snippet->description }}</p>
          </a>
        </div>

      </div>
      <hr>
    @endforeach  
    
  </div>
  
<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
</body>
</html>
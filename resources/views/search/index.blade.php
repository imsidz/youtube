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
  @foreach($search as $result)
      @foreach($result as $video)
      {{-- {{ dd($video->snippet->title ) }} --}}
      {{-- {{ dd($snippet) }} --}}
       <div class="row">
           <div class="col-md-4">
               <img src="{{-- {{ $video->snippet->thumbnails->medium->url}} --}}">
           </div>
           <div class="col-md-8">
                {!! $video->snippet->title !!}
           </div>
       </div>
       @endforeach
  @endforeach
   </div>
<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
</body>
</html>
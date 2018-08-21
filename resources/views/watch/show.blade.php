{{-- {!! $video->player->embedHtml !!} --}}

<!DOCTYPE html>
<html>
<head>
	<title>Show</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
</head>
<body>
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
   <style type="text/css">
     .boxhead a {
          color: #000;
          text-decoration: none;
      }
   </style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div>
				
			</div>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$video->id}}?autoplay=1" allowfullscreen></iframe>
			</div>
		</div>
		<div class="col-md-4">
			<div class="container-fluid">
				@foreach($relatedVideos as $related)
				<div class="row boxhead">
					<div class="col-md-4">
						<a href="{{ url('watch/' . $related->id->videoId)}}">
							<img src="{{$related->snippet->thumbnails->medium->url}}" class="img-fluid">
						</a>
					</div>
					<div class="col-md-8">
						<a href="{{ url('watch/' . $related->id->videoId)}}">
							<h3 style="font-size: 14px;">{{ $related->snippet->title }}</h3>
							<p>{{ $related->snippet->channelTitle }}</p>
						</a>
					</div>
				</div>
				<hr>
				@endforeach
			</div>
			
		</div>
	</div>
	
</div>

<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
</body>
</html>
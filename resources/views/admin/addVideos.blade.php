@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row" style="padding-top: 0; margin: 0">
            <h3 align = "center">Audio Video Images</h3>
        </div>
          <div class="row">
            <div class="col-md-2">
                <a href="{{url('/home')}}" class="btn btn-success" >
                    <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                    Back to Dashboard</a>
            </div>
        	<div class="col-md-10" style="text-align: right">
                <a class="btn btn-primary fa fa-plus-circle" href={{url('/AudioVideoImages')}}> Add Audio</a>
                <a class="btn btn-primary fa fa-plus-circle" href={{url('/AddVideos')}}> Add Video</a>
                <a class="btn btn-primary fa fa-plus-circle" href={{url('/AddImages')}}> Add Image</a>     
        	</div>
        </div>
    </div>

@endsection
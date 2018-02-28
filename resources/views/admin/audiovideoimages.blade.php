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
        <div>
			<form class="form-horizontal" method="POST" action="{{ url('AudioVideoImages') }}">
			<div class="form-group">
					<label for="tag" class="col-md-4 control-label">Tag :</label>
				<div class="col-md-4">
                    <input id="tag[]" type="tag" class="form-control" name="tag[]" required>
                </div>
            </div>
            <div class="form-group">
					<label for="tag" class="col-md-4 control-label">Link :</label>
				<div class="col-md-4">
                    <input id="tag[]" type="tag" class="form-control" name="tag[]" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-5">
                    <button type="submit" class="btn btn-primary">
                           <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Save 
                    </button>
                </div>
			</div>

			</form>
		</div>
</div>


@endsection
@extends('layouts.app')
@section('content')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <div class="container" style="width: 100%">
        <div class="row" style="padding-top: 0; margin: 0">
            <h3 align="center">Image</h3>
            <br>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="row">

                <div class="col-md-2">
                    <a href="{{url('/home')}}" class="btn btn-success">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                        Back to Dashboard</a>
                </div>
                <div class="col-md-10" style="text-align: right">
                    <a class="btn btn-primary fa fa-plus-circle" href={{url('/AddAudios')}}> Add Audio</a>
                    <a class="btn btn-primary fa fa-plus-circle" href={{url('/AddVideos')}}> Add Video</a>
                    <a class="btn btn-primary fa fa-plus-circle" href={{url('/AddImages')}}> Add Image</a>
                </div>
            </div>
            <br>

            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue">
                    <h4>Add Image</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('AddImages') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group">
                                @if($error=='Does not Exist')
                                <label for="tag" class="col-md-1 control-label" style="padding-right: 0">Tag :</label>
                                <div class="col-md-3">
                                    <input id="tag" type="tag" class="form-control" name="tag" required>
                                </div>
                                <label for="link" class="col-md-1 control-label" style="padding-right: 0">Link :</label>
                                <div class="col-md-6">
                                    <input id="link" type="link" class="form-control" name="link" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2" style="float:right">
                            <a type="button" href="{{url('AddMoreImages')}}">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add row
                            </a>
                        </div>
                        <br>
                        <div class="form-group">
                            <div align="center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
        <label for="tag" class="col-md-1 control-label" style="padding-right: 0">Tag :</label>
        <div class="col-md-3">
            <input id="tag" type="tag" class="form-control" name="tag" required>
        </div>
        <label for="link" class="col-md-1 control-label" style="padding-right: 0">Link :</label>
        <div class="col-md-6">
            <input id="link" type="link" class="form-control" name="link" required>
        </div>
        </div>
        </div>

        <div class="col-md-2" style="float:right">
            <a type="button" href="{{url('AddMoreImages')}}">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add row
            </a>
        </div>
        <br>
        <div class="form-group">
            <div align="center">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Save
                </button>
            </div>
        </div>
        </form>
        </div>
        </div>
        <div class="col-md-6">
            <h7>Image already exists</h7>
        </div>
        </div>
        </div>
    @endif


@endsection
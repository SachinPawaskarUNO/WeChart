@extends('layouts.app')
@section('content')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
                        @for ($i = 0; $i < $counter ; $i++)
                        <div class="row">
                            <div class="form-group">
                                <label for="tag" class="col-md-1 control-label" style="padding-right: 0">Name :</label>
                                <div class="col-md-3">
                                    <input id="tag[]" type="tag" class="form-control" name="tag[]" required>
                                </div>
                                <label for="link" class="col-md-1 control-label" style="padding-right: 0">Link :</label>
                                <div class="col-md-6">
                                    <input id="link[]" type="link" class="form-control" name="link[]" required>
                                </div>
                            </div>
                        </div>
                        @endfor
                        @if ($counter != '1')
                            <div class="col-md-4" style="float:right">
                                <a type="button" href="{{url('RemoveImages')}}">
                                    <i class="fa fa-minus-circle" aria-hidden="true"></i> Remove row
                                </a>
                            </div>

                        @endif
                        <div class="col-md-4" style="float:right">
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
                    </form>
                </div>
            </div>
            @if($Error == 'Exists')
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if ($count_exists == '1')
                        Error! Image <strong><i>{{$exists_tag[0]}}</i></strong> is already present in the database.
                    @elseif ($count_exists > '1')
                        @foreach ($exists_tag as $tag)
                            <strong><i>{{$tag}}</i></strong>&nbsp;&nbsp; image already present in the database.
                            <br>
                        @endforeach
                    @endif
                </div>
            @endif
            @if($error == 'Does not Exist')
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if ($count_added == '1')
                        Success!! <strong><i>{{$added_tag[0]}}</i></strong>  image added
                    @elseif ($count_added > '1')
                        @foreach ($added_tag as $tag)
                            <strong><i>{{$tag}}</i></strong>&nbsp;&nbsp; image added to the database.
                            <br>
                        @endforeach
                    @endif
                </div>
            @endif
        </div>

    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel-body">
                <div class="navbar-form navbar-left">
                    <a href="{{url('/AddImages')}}" class="btn btn-success">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                        Refresh Images</a>
                </div>
                <form class="navbar-form navbar-right" method="GET" action="{{ url('AddImages') }}">
                    {{ csrf_field() }}

                    <input id="search_images" type="text" class="form-control" name="search" placeholder="Search Image...">
                    <span class="input-group-btn-right">
                            <button class="btn btn-default-sm" type="submit">
                                <i class="fa fa-search"> </i>
                            </button>
                        </span>
                </form>
            </div>
            <div class="panel panel-default" style="margin-bottom: 0;padding-bottom: 0">
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr class="panel-heading" style="background-color: lightblue;font-size: medium">
                            <th><i aria-hidden="true"></i> Name</th>
                            <th><i aria-hidden="true"></i> Link  </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($images as $image)
                            <tr>
                                <td><p><?php echo($image->image_lookup_value_tag); ?></p></td>
                                <td><p><?php echo($image->image_lookup_value_link); ?></p></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $images->links() }}

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".alert").fadeOut(5000);

            var inputsChanged = false;
            $('#images_form').change(function() {
                inputsChanged = true;
            });
        });

    </script>
@endsection
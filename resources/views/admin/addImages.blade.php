@extends('layouts.app')
@section('content')

    <style>
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
    </style>
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
                        <div class="row" id="imagelist">
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
                        <div class="col-md-2" style="float:right">
                               <a href="#" type="button" id="addimage">
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
                        Error! Image <strong><i>{{$exists_tag[0]}}&nbsp; -&nbsp;{{$exists_link[0]}} </i></strong> is already present in the database.
                    @elseif ($count_exists > '1')
                        @for($i=0; $i < $count_exists;$i++)
                            Error! Image <strong><i>{{$exists_tag[$i]}}&nbsp; -&nbsp;{{$exists_link[$i]}}</i></strong> &nbsp;&nbsp;already present in the database.
                            <br>
                        @endfor
                    @endif
                </div>
            @endif
            @if($error == 'Does not Exist')
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if ($count_added == '1')
                        Success!! <strong><i>{{$added_tag[0]}} - {{$added_link[0]}}</i></strong>  image added
                    @elseif ($count_added > '1')
                        @for($i=0; $i < $count_added; $i++)
                            <strong><i>{{$added_tag[$i]}} - {{$added_link[$i]}}</i></strong>&nbsp;&nbsp; image added to the database.
                            <br>
                        @endfor
                    @endif
                </div>
            @endif
        </div>
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel-body" style="alignment: center">
                <label style="margin-left: 260px"><strong>Upload Excel & Submit - Only 2 columns tag & link</strong></label>
                    <div class="row">
                        <div class="col-md-3" style="margin-top: 10px">
                    <a href="{{url('/AddImages')}}" class="btn btn-success">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                        Refresh Images</a>
                </div>
                        <div class="col-md-4" style="margin-left: 100px;margin-top: 10px" title="Only 2 columns tag & link">
                            <form class="form-horizontal" method="POST" action="{{ url('importimage') }}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                         <span class="btn btn-success btn-file field-tip" >
                                            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                                             Upload <input type="file" name="file">
                                         </span>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-success " type="submit" value="Upload" title="Only 2 columns tag & link">
                                            <i class="fa fa-submit"> </i>Submit
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <div class="col-md-4.5">
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
                    </div>
            </div>
            <div class="panel panel-default" style="margin-bottom: 0;padding-bottom: 0">
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr class="panel-heading" style="background-color: lightblue;font-size: medium">
                            <th><i aria-hidden="true"></i> Name</th>
                            <th><i aria-hidden="true"></i> Link  </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($images as $image)
                            <tr>
                                <td><p><?php echo($image->image_lookup_value_tag); ?></p></td>
                                <td><p><?php echo($image->image_lookup_value_link); ?></p></td>
                                <td style="text-align: right">
                                    <a href="{{ route('delete_image', ['id' => $image->image_lookup_value_id]) }}" class="btn btn-danger enable" id="delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                    </a>
                                </td>
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
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $("#imagelist"); //Fields wrapper
            var add_button      = $("#addimage"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                    if(x < max_fields){ //max input box allowed
                        x++; //text box increment   
                    $(wrapper).append('<div class="row"><br><label for="tag" class="col-md-1 control-label" style="padding-right: 0">Name :</label> <div class="col-md-3"> <input id="tag[]" type="tag" class="form-control" name="tag[]" required> </div> <label for="link" class="col-md-1 control-label" style="padding-right: 0">Link :</label> <div class="col-md-6"> <input id="link[]" type="link" class="form-control" name="link[]" required></div><br><div class="col-md-1" ><a href="#" class="remove_field"><i class="fa fa-close" style="font-size:25px"></i></a></div> </div>');
                }
                
                });

                $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent().parent('div').remove(); x--;
                });

            var inputsChanged = false;
            $('#images_form').change(function() {
                inputsChanged = true;
            });
        });

    </script>
@endsection
@extends('layouts.app')
@section('content')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <div class="container" style="width: 100%">
        <div class="row" style="padding-top: 0; margin: 0">
            <h3 align="center">Audio</h3>
            <br>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="row" style="padding-bottom: 20px;">

                <div class="col-md-2">
                    <a href="{{url('/home')}}" class="btn btn-success">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                        Back to Dashboard</a>
                </div>
                <div class="col-md-10" style="text-align: right">
                    <a class="btn btn-primary" href={{url('/AddAudios')}}>
                        <span class="fa fa-plus-circle"></span>
                        Add Audio</a>
                    <a class="btn btn-primary" href={{url('/AddVideos')}}>
                        <span class="fa fa-plus-circle"></span>
                        Add Video</a>
                    <a class="btn btn-primary" href={{url('/AddImages')}}>
                        <span class="fa fa-plus-circle"></span>
                        Add Image</a>
                </div>
            </div>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue">
                    <h4>Add Audio</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('AddAudios') }}">
                        {{ csrf_field() }}
                        @for ($i = 0; $i < $counter ; $i++)
                            <div class="row" id="audiolist">
                                <div class="form-group">
                                    <label for="tag" class="col-md-1 control-label" style="padding-right: 0;margin-left: 2px;">Name :</label>
                                    <div class="col-md-3">
                                        <input id="tag[]" type="tag" class="tag form-control" name="tag[]" autocomplete="off" required>
                                    </div>
                                    <label for="link" class="col-md-1 control-label" style="padding-right: 0;margin-left: 3px;">Link :</label>
                                    <div class="col-md-6">
                                        <input id="link[]" type="url" class="form-control" name="link[]" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        <div style="padding-top: 10px; padding-right: 10px;">
                            <div class="col-md-2" style="float:right">
                                <a href="#" type="button" id="addaudio" style="color: #3097D1;">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add row
                                </a>
                            </div>
                        </div>
                        <div class="form-group" style="padding-top: 20px;">
                            <div align="center">
                                <button type="submit" class="btn btn-primary" id="saveaudio">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if($Error == 'Exists')
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if ($count_exists == '1')
                        Error! Audio <strong><i>{{$exists_tag[0]}}&nbsp; -&nbsp;{{$exists_link[0]}} </i></strong> is already present in the database.
                    @elseif ($count_exists > '1')
                        @for($i=0; $i < $count_exists;$i++)
                            Error! Audio <strong><i>{{$exists_tag[$i]}}&nbsp; -&nbsp;{{$exists_link[$i]}}</i></strong> &nbsp;&nbsp; already present in the database.
                            <br>
                        @endfor
                    @endif
                </div>
            @endif
            @if($error == 'Does not Exist')
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if ($count_added == '1')
                        Success!! <strong><i>{{$added_tag[0]}} - {{$added_link[0]}}</i></strong>  audio added
                    @elseif ($count_added > '1')
                        @for($i=0; $i < $count_added; $i++)
                            <strong><i>{{$added_tag[$i]}} - {{$added_link[$i]}}</i></strong>&nbsp;&nbsp; audio added to the database.
                            <br>
                        @endfor
                    @endif
                </div>
            @endif
        </div>
    </div>
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel-body">
                    <div class="col-md-3" style="margin-top: 10px">
                        <a href="{{url('/AddAudios')}}" class="btn btn-success" onclick="return Confirmrefresh()">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            Refresh Audios</a>
                    </div>
                    <form class="navbar-form navbar-right" method="GET" action="{{ url('AddAudios') }}">
                        {{ csrf_field() }}
                        <input id="search_audios" type="text" class="form-control" name="search" placeholder="Search Audio...">
                        <span class="input-group-btn-right">
                            <button class="btn btn-default-sm" type="submit">
                                <i class="fa fa-search"> </i>
                            </button>
                        </span>
                    </form>
                </div>
                <div class="panel panel-default" style="margin-bottom: 0;padding-bottom: 0">
                    <div id="audio_table" class="panel-body">
                        <table class="table table-striped table-bordered table-hover" id="audiotable">
                            <thead>
                            <tr class="panel-heading" style="background-color: lightblue;font-size: medium">
                                <th><i aria-hidden="true"></i> Name</th>
                                <th><i aria-hidden="true"></i> Link  </th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($audios as $audio)
                                <tr>
                                    <td><?php echo($audio->audio_lookup_value_tag); ?> </td>
                                    <td><?php echo($audio->audio_lookup_value_link); ?></td>
                                    <td style="text-align: right">
                                        <a href="{{ route('delete_audio', ['id' => $audio->audio_lookup_value_id]) }}" class="btn btn-danger enable" id="delete" onclick="return Delete()">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $audios->links() }}

                    </div>
                </div>
            </div>
        </div>

    <script>
        $(document).ready(function () {

            $(".alert").fadeOut(5000);
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $("#audiolist"); //Fields wrapper
            var add_button      = $("#addaudio"); //Add button ID
            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if (x >= max_fields) {
                } else { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="row" style="padding-top: 20px;margin-left: 0px;"><div class="form-group"><label for="tag" class="col-md-1 control-label" style="padding-right: 0">Name :</label> <div class="col-md-3"> <input id="tag[]" type="tag" class="tag form-control" name="tag[]" autocomplete="off" required> </div> <label for="link" class="col-md-1 control-label" style="padding-right: 0">Link :</label> <div class="col-md-6"> <input id="link[]" type="url" class="form-control" name="link[]" autocomplete="off" required></div><div class="col-md-1"><a href="#" class="remove_field"><i class="fa fa-close" style="font-size: 18px;padding-top: 8px; color: red;"></i></a></div> </div></div>');
                }

            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent().parent('div').remove(); x--;
            });

            var inputsChanged = false;
            $('#audios_form').change(function() {
                inputsChanged = true;
            });

            $("#saveaudio").click(function() {
                var len = $(".tag").length;
                //var elements= new array();
                var elements = document.getElementsByClassName("tag");
                var a = new Array();
                for (var i = 0; i < len; i++) {
                    a[i] = elements[i].value;
                }
                for (var i = 0; i <= a.length; i++) {
                    if(a[i]!=""){
                        if (!a[i].replace(/\s/g, '').length) {
                            alert("Input cannot contain only white spaces");
                        }
                    }
                }
            });

        });

        function audio_table()
        {
            $("#audio_table").load("/admin/audio_table/");
        }

        function Delete() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

        function Confirmrefresh() {
            var x = confirm("You will lose any unsaved changes. Are you still ok to refresh?");
            if (x)
                return true;
            else
                return false;
        }

    </script>
@endsection
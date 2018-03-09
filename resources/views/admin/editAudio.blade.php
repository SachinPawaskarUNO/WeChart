@extends('layouts.app')
@section('content')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <div class="container" style="width: 100%">
        <div class="row" style="padding-top: 0; margin: 0">
            <h3 align="center">Audio</h3>
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
                    <h4>Add Audio</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('AddAudios') }}">
                        {{ csrf_field() }}
                        @for ($i = 0; $i < $counter ; $i++)
                            <div class="row" id="audiolist">
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
                            <a href="#" type="button" id="addaudio">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add row
                            </a>
                        </div>
                        <br>
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
                        Error! Audio <strong><i>{{$exists_tag[0]}}</i></strong> is already present in the database.
                    @elseif ($count_exists > '1')
                        @foreach ($exists_tag as $tag)
                            <strong><i>{{$tag}}</i></strong>&nbsp;&nbsp; audio already present in the database.
                            <br>
                        @endforeach
                    @endif
                </div>
            @endif
            @if($error == 'Does not Exist')
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if ($count_added == '1')
                        Success!! <strong><i>{{$added_tag[0]}}</i></strong>  audio added
                    @elseif ($count_added > '1')
                        @foreach ($added_tag as $tag)
                            <strong><i>{{$tag}}</i></strong>&nbsp;&nbsp; audio added to the database.
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
                        <a href="{{url('/AddAudios')}}" class="btn btn-success">
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
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="panel-heading" style="background-color: lightblue;font-size: medium">
                                <th><i aria-hidden="true"></i> Name</th>
                                <th><i aria-hidden="true"></i> Link  </th>
                                <th> </th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($audios as $audio)
                                @if($audio->audio_lookup_value_id == $id)
                                    <tr id="<?php echo $audio->audio_lookup_value_id; ?>">
                                        <td><input type="text" id="audiotag" name="audiotag" data-audioid="{{$audio->audio_lookup_value_id}}" value="{{$audio->audio_lookup_value_tag}}"></td>
                                        <td><input type="text" id="audiovalue" name="audiovalue" data-audioid="{{$audio->audio_lookup_value_id}}" value="{{$audio->audio_lookup_value_link}}"></td>
                                        <input type="hidden" id="audioid" name="audioid" value="{{$audio->audio_lookup_value_id}}">
                                        <input type="hidden" id="thisid" name="thisid" value="newedit">
                                        <td style="text-align: right">
                                            <a href="{{ url('/addAudios') }}" class="btn enable" id="save">
                                                <i class="fa fa-save" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td style="text-align: right">
                                            <a href="{{ route('delete_audio', ['id' => $audio->audio_lookup_value_id]) }}" class="btn btn-danger enable" id="delete">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @else
                                    <tr id="<?php echo $audio->audio_lookup_value_id; ?>">
                                        <td><?php echo($audio->audio_lookup_value_tag); ?> </td>
                                        <td><?php echo($audio->audio_lookup_value_link); ?></td>
                                        <td style="text-align: right">
                                            <a href="{{ url('/editAudio', ['id' => $audio->audio_lookup_value_id]) }}" class="btn enable" id="edit">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td style="text-align: right">
                                            <a href="{{ route('delete_audio', ['id' => $audio->audio_lookup_value_id]) }}" class="btn btn-danger enable" id="delete">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        {{ $audios->links() }}

                    </div>
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
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="row"><br><label for="tag" class="col-md-1 control-label" style="padding-right: 0">Name :</label> <div class="col-md-3"> <input id="tag[]" type="tag" class="form-control" name="tag[]" required> </div> <label for="link" class="col-md-1 control-label" style="padding-right: 0">Link :</label> <div class="col-md-6"> <input id="link[]" type="link" class="form-control" name="link[]" required></div><br><div class="col-md-1"><a href="#" class="remove_field"><i class="fa fa-close" style="font-size:25px"></i></a></div> </div>');
                }

            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent().parent('div').remove(); x--;
            });


            var inputsChanged = false;
            $('#audios_form').change(function() {
                inputsChanged = true;
            });

            $("#btn_save_url").click(function(){
                inputsChanged = false;
                var audiotag = $('input[name^="audiotag"]').val();
                var audiovalue = $('input[name^="audiovalue"]').val();
                var audioid = $('input[name^="audiotag"]').attr("data-audioid");
                alert(audiotag);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: '{{route('post_new_audio_link')}}',
                    data: { audiotag: audiotag ,audiovalue: audiovalue,audioid:audioid},
                    success: function() {
                    location.reload();
                    }
                });
            });

        });
        $('#search_audios').select2({
            /*placeholder: "Choose Audios...",*/
            minimumInputLength: 2,
            ajax: {
                url: '{{route('audios_find')}}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: false
            }
        });

    </script>
@endsection
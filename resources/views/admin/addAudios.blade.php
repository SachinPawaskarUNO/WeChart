@extends('layouts.app')
@section('content')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
            @if($error=='Exists')
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if ($count == '1')
                        Error! Audio <strong><i>{{$exists_tag[0]}}</i></strong> is already present in the database.
                    @endif
                    @if ($count > '1')
                        @foreach ($exists_tag as $tag)
                            <strong><i>{{$tag}}</i></strong>&nbsp;&nbsp; audio already present in the database.
                                 <br>
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    <script>
            $(document).ready(function() {
                $(".alert").fadeOut(5000);
                var max_fields      = 10; //maximum input boxes allowed
                var wrapper         = $("#audiolist"); //Fields wrapper
                var add_button      = $("#addaudio"); //Add button ID

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
                })

            });
    </script>
@endsection
<style>
    .table
    {
        table-layout: fixed;
        word-wrap: break-word;
    }
    table tr th:nth-child(1){
        width: 20%;
    }
    table tr th:nth-child(2){
        width: 65%;
    }
</style>
@extends('layouts.app')
@section('content')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <div class="container" style="width: 100%">
        <div class="col-md-8 col-md-offset-2">
            <div class="row" style="padding-bottom: 20px;">
                <br>
                <div class="col-md-2">
                    <a href="{{url('/home')}}" class="btn btn-success">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                        Back to Dashboard</a>
                </div>
                <div class="col-md-10" style="text-align: right">
                    <a class="btn btn-primary" href={{url('/AddAudios')}}><span class="fa fa-volume-up"></span>
                        Audio</a>
                    <a class="btn btn-primary" style="background-color: #1A3765" href={{url('/AddVideos')}}><span class="fa fa-youtube-play"></span>
                        Video</a>
                    <a class="btn btn-primary" href={{url('/AddImages')}}><span class="fa fa-image"></span>
                        Image</a>
                </div>
            </div>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: lightblue">
                    <h4>Add Video</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{url("PostVideos")}}">
                        {{ csrf_field() }}
                        @for ($i = 0; $i < $counter ; $i++)
                            <div class="row" id="videolist">
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
                                <a href="#" type="button" id="addvideo" style="color: #3097D1;">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Add row
                                </a>
                            </div>
                        </div>
                        <div class="form-group" style="padding-top: 20px;">
                            <div align="center">
                                <button type="submit" class="btn btn-primary" id="savevideo">
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
                        Error! Video <strong><i>{{$exists_tag[0]}}&nbsp; -&nbsp;{{$exists_link[0]}} </i></strong> is already present in the database.
                    @elseif ($count_exists > '1')
                        @for($i=0; $i < $count_exists;$i++)
                            Error! Video <strong><i>{{$exists_tag[$i]}}&nbsp; -&nbsp;{{$exists_link[$i]}}</i></strong> &nbsp;&nbsp; already present in the database.
                            <br>
                        @endfor
                    @endif
                </div>
            @endif
            @if($error == 'Does not Exist')
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if ($count_added == '1')
                        Success!! <strong><i>{{$added_tag[0]}} - {{$added_link[0]}}</i></strong>  video added
                    @elseif ($count_added > '1')
                        @for($i=0; $i < $count_added; $i++)
                            <strong><i>{{$added_tag[$i]}} - {{$added_link[$i]}}</i></strong>&nbsp;&nbsp; video added to the database.
                            <br>
                        @endfor
                    @endif
                </div>
            @endif
        </div>
    </div>
    <div class="container" style="width: 100%">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-body">

                <div class="navbar-right">
                    <div class="row">
                        <div class="col-md-10"><input id="search_videos" type="text" class="form-control" name="search" placeholder="Search Video..."></div>
                        <div class="col-md-1"><button id="clearsearch" autocomplete="off" class="close" type="button"><i class="fa fa-close" style="font-size:22px;color:#DD0000"></i></button></div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default" style="margin-bottom: 0;padding-bottom: 0">
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover" id="video_table" >
                        <thead>
                        <tr class="panel-heading" style="background-color: #e0f2f1;font-size: medium">
                            <th><i aria-hidden="true"></i> Name</th>
                            <th><i aria-hidden="true"></i> Link  </th>
                            <th colspan="2"> Actions </th>
                        </tr>
                        </thead>
                        <?php $rownum=0; ?>
                        <tbody id="tvideobody">
                        @foreach ($videos as $video)
                            <?php $rownum=$rownum+1; ?>
                            <tr>
                                <td><?php echo($video->video_lookup_value_tag); ?> </td>
                                <td><?php echo($video->video_lookup_value_link); ?></td>
                                <td style="text-align: right">
                                    <button class="editButton btn btn-info" id="<?php echo $rownum ?>"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                    <button class="saveButton btn btn-success" id="<?php echo $rownum ?>" value="{{$video->video_lookup_value_id}}"><i class="fa fa-save" aria-hidden="true"></i></button>
                                </td>
                                <td style="text-align: right">
                                    <a href="{{ route('delete_video', ['id' => $video->video_lookup_value_id]) }}" class="btn btn-danger enable" id="delete" onclick="return Delete()">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $videos->links() }}

                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {

            cssProp();
            function cssProp() {
                var saveelems = document.getElementsByClassName('saveButton');

                for (var i = 0; i < saveelems.length; i++){
                    saveelems[i].style.display='none';
                }

            }

            $('#search_videos').on('keyup',function(){
                $value=$(this).val();
                $.ajax({
                    type : 'get',
                    url : '{{url("SearchVideos")}}',
                    data:{'search':$value},
                    success:function(data){
                        $('#tvideobody').html(data);
                        cssProp();
                        $(".editButton").click(function(){
                            var id = $(this).attr('id');
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-top' : '2px #5DADE2 solid'});
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-bottom' : '2px #5DADE2 solid'});
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-left' : '2px #5DADE2 solid'});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-top' : '2px #5DADE2 solid'});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-bottom' : '2px #5DADE2 solid'});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-right' : '2px #5DADE2 solid'});
                            edit(id);
                        });
                        $(".saveButton").click(function(){
                            var id = $(this).attr('id');
                            var value=$(this).attr('value');
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-top' : ''});
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-bottom' : ''});
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-left' : ''});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-top' : ''});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-bottom' : ''});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-right' : ''});
                            save(id,value);
                        });
                    }
                });
            });

            $("#clearsearch").click(function(event){

                $('#search_videos').val('');
                $.ajax({
                    type : 'get',
                    url : '{{url("SearchVideos")}}',
                    data:{'search':""},
                    success:function(data){
                        $('#tvideobody').html(data);
                        cssProp();
                        $(".editButton").click(function(){
                            var id = $(this).attr('id');
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-top' : '2px #5DADE2 solid'});
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-bottom' : '2px #5DADE2 solid'});
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-left' : '2px #5DADE2 solid'});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-top' : '2px #5DADE2 solid'});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-bottom' : '2px #5DADE2 solid'});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-right' : '2px #5DADE2 solid'});
                            edit(id);

                        });
                        $(".saveButton").click(function(){
                            var id = $(this).attr('id');
                            var value=$(this).attr('value');
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-top' : ''});
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-bottom' : ''});
                            $(this).closest("tr").find("td:nth-child(1)").css({'border-left' : ''});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-top' : ''});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-bottom' : ''});
                            $(this).closest("tr").find("td:nth-child(2)").css({'border-right' : ''});
                            save(id,value);
                        });
                    }
                });
            });

            $(".alert").fadeOut(5000);
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $("#videolist"); //Fields wrapper
            var add_button      = $("#addvideo"); //Add button ID
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
            $('#videos_form').change(function() {
                inputsChanged = true;
            });
            function edit(id) {
                var id_class = id-1;

                document.getElementsByClassName('editButton')[id_class].style.display='none';
                document.getElementsByClassName('saveButton')[id_class].style.display='inline-block';

                document.getElementById("video_table").rows[id].cells[0].contentEditable='true';
                document.getElementById("video_table").rows[id].cells[1].contentEditable='true';
            }

            $(".editButton").click(function(){
                var id = $(this).attr('id');
                $(this).closest("tr").find("td:nth-child(1)").css({'border-top' : '2px #5DADE2 solid'});
                $(this).closest("tr").find("td:nth-child(1)").css({'border-bottom' : '2px #5DADE2 solid'});
                $(this).closest("tr").find("td:nth-child(1)").css({'border-left' : '2px #5DADE2 solid'});
                $(this).closest("tr").find("td:nth-child(2)").css({'border-top' : '2px #5DADE2 solid'});
                $(this).closest("tr").find("td:nth-child(2)").css({'border-bottom' : '2px #5DADE2 solid'});
                $(this).closest("tr").find("td:nth-child(2)").css({'border-right' : '2px #5DADE2 solid'});
                edit(id);

            });
            function save(id,value) {
                var id_class = id-1;
                var arr = new Array();

                document.getElementsByClassName('editButton')[id_class].style.display='inline-block';
                document.getElementsByClassName('saveButton')[id_class].style.display='none';
                document.getElementById("video_table").rows[id].cells[0].contentEditable='false';
                document.getElementById("video_table").rows[id].cells[1].contentEditable='false';
                arr.push(document.getElementById("video_table").rows[id].cells[0].innerHTML);
                arr.push(document.getElementById("video_table").rows[id].cells[1].innerHTML);
                arr.push(value);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: '{{route('post_new_video')}}',
                    data: { name:arr[0] ,link:arr[1], id:arr[2]}
                });
            }

            $(".saveButton").click(function(){
                var id = $(this).attr('id');
                var value=$(this).attr('value');
                $(this).closest("tr").find("td:nth-child(1)").css({'border-top' : ''});
                $(this).closest("tr").find("td:nth-child(1)").css({'border-bottom' : ''});
                $(this).closest("tr").find("td:nth-child(1)").css({'border-left' : ''});
                $(this).closest("tr").find("td:nth-child(2)").css({'border-top' : ''});
                $(this).closest("tr").find("td:nth-child(2)").css({'border-bottom' : ''});
                $(this).closest("tr").find("td:nth-child(2)").css({'border-right' : ''});
                save(id,value);
            });

            $("#savevideo").click(function() {
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

        function Delete() {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }



    </script>
@endsection
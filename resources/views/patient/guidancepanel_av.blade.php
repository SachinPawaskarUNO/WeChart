
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-1">

            </div>
            <label> Audio: </label>
        </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <select class="form-control" id="searchaudio" onchange='Checkaudio(this.value);'>
                        <option value=""></option>
                        @foreach($audios as $audio)
                            <option value="<?php echo $audio['audio_lookup_value_link'];?>"><?php echo $audio['audio_lookup_value_tag'];?></option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-lg-10" id="myaudio"></div>
                <div class="col-sm-1"></div>
            </div>


        <div class="row">
            <div class="col-sm-1"></div>
            <label> Video: </label>
        </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <select class="form-control" id="search" onchange='Checkfunc(this.value);'>
                        <option value=""></option>
                        @foreach($videos as $video)
                            <option value="<?php echo $video['video_lookup_value_link'];?>"><?php echo $video['video_lookup_value_tag'];?></option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <br>

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-lg-10" id="myvideo"></div>
                <div class="col-sm-1"></div>
            </div>
        <div class="row">
            <div class="col-sm-1">

            </div>
            <label> Picture: </label>
        </div>
            <div class="row">
                <div class="col-sm-1">

                </div>
                <div class="col-sm-10">
                    <select class="form-control" id="searchpic" onchange='CheckPicture(this.value);'>
                        <option value=""></option>
                        @foreach($pictures as $picture)
                            <option value="<?php echo $picture['image_lookup_value_link'];?>"><?php echo $picture['image_lookup_value_tag'];?></option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-1"></div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-lg-10" id="mypicture"></div>
                <div class="col-sm-1"></div>
                <br>
            </div>
    </div>
<script type="text/javascript">
        function Checkfunc(val){
            if(val=='')
            {
            return 'false';
            }
            else
            {
                var myId = getId(val);

                $('#myvideo').html('<iframe width="380" height="225" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');

                function getId(url)
                {
                    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                    var match = url.match(regExp);

                    if (match && match[2].length == 11)
                    {
                        return match[2];
                    }
                    else
                    {
                        return 'error';
                    }
                }
            }

        }
        $('#search').select2({
            placeholder: 'Select a video..',
            width:'100%'
        });

        function Checkaudio(val){
            if(val=='')
            {
            return 'false';
            }
            else
            {
                var myId = getId(val);

                $('#myaudio').html('<iframe width="380" height="225" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');

                function getId(url)
                {
                    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
                    var match = url.match(regExp);

                    if (match && match[2].length == 11)
                    {
                        return match[2];
                    }
                    else
                    {
                        return 'error';
                    }
                }
            }

        }
        $('#searchaudio').select2({
            placeholder: 'Select an audio..',
            width:'100%'
        });

        function CheckPicture(val)
        {
            if(val=='')
            {
            return 'false';
            }
            else
            {
                console.log("test");
                console.log(val);
                $('#mypicture').html('<img width="380" height="225" src='+ val +'>');
            }

            }
        $('#searchpic').select2({
            placeholder: 'Select a picture..',
            width:'100%'
        });
</script>

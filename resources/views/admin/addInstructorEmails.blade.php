@extends('layouts.app')

@section('content')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <div class="container">
<div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="row col-md-8">
                <a href="{{url('/home')}}" class="btn btn-success" style="float: left"> 
                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                Back to Dashboard</a>
            </div>
            <br><br>
            <div class="panel panel-default">
                <div class="panel-heading" style="backgroundd-color: lightblue">
                        <h4>Add Instructor Email Address</h4>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('AddInstructorEmails') }}">
                        {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Enter E-Mail Address:</label>
                                    
                                        <div class="col-md-6" id="emaillist">
                                            <div class="row"><div class="col-md-11"><input id="email[]" type="email" class="form-control" name="email[]" required></div></div>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                              



                                <div class="col-md-4" style="float:right">
                                    <a type="button" href="#" id="addemail">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Add row
                                    </a>
                                </div>
                                <br>
                                <br>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i> &nbsp;Save 
                                        </button>
                                    </div>
                                </div>
                    </form>
                </div>
               
            </div>
             <!-- After user submits request -->
             {{--If Unique contraint violation--}}
             @if($Error == 'Email Present')
                 <div class="alert alert-danger alert-dismissable">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     @if ($counter == '1')
                         Error! This email address is already present in the database.
                     @endif
                     @if ($counter > '1')
                         Error! Either of your entered email addresses is already present in the database.
                     @endif
                 </div>
             @endif

             {{--if successfully submitted--}}
             @if($Error == 'No')
                 <div class="alert alert-success alert-dismissable">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                     @if ($counter == '1')
                         Success! Email address is saved in the database.
                     @endif
                     @if ($counter == '2')
                         Success! Both the Email addresses are saved in the database.
                     @endif
                     @if ($counter > '2')
                         Success! All {{$counter}} Email addresses are saved in the database.
                     @endif
                 </div>
             @endif
 <div>                
<div>
    <script>

        $(document).ready(function() {
            $(".alert").fadeOut(5000);
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $("#emaillist"); //Fields wrapper
            var add_button      = $("#addemail"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div class="row"><br><div class="col-md-11"><input class="form-control" type="email" name="email[]" id="email[]" required></div><div class="col-md-1" ><a href="#" class="remove_field"><i class="fa fa-close" style="font-size:25px"></i></a></div></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent().parent('div').remove(); x--;
            })

        });
    </script>
@endsection

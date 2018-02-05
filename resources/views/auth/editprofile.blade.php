<<<<<<< HEAD
  <!--
   Developer - Varun Parihar
   Date - 09/23/2017
   Description - View for Edit Profile functionality.
   10/27/2017 - Added code to handle change password fuctionality
  -->
=======
<!--
 Developer - Varun Parihar
 Date - 09/23/2017
 Description - View for Edit Profile functionality.
-->
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
@extends('layouts.app')
@section('content')

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<<<<<<< HEAD
=======


>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
  <div class="container">
  <div class="col-md-8 col-md-offset-2">
    @if($user['role'] == 'Admin')
    <div class="row">
      <a href="{{url('/home')}}" class="btn btn-success" style="float: left">
        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
        Back to Dashboard</a>
    </div>
      @elseif($user['role'] == 'Instructor')
        <div class="row">
          <a href="{{url('/InstructorHome')}}" class="btn btn-success" style="float: left">
            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
            Back to Dashboard</a>
        </div>
        @else($user['role'] == 'Student')
          <div class="row">
            <a href="{{url('/StudentHome')}}" class="btn btn-success" style="float: left">
              <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
              Back to Dashboard</a>
          </div>
    @endif
    <br>
<<<<<<< HEAD
        @if (Session::has('success'))
            <div id="success" class="alert alert-success" style="">{!! Session::get('success') !!}</div>
        @endif
        @if (Session::has('empty_firstname'))
            <div id="empty_firstname" class="alert alert-danger" style="">{!! Session::get('empty_firstname') !!}</div>
        @endif
        @if (Session::has('empty_lastname'))
            <div id="empty_lastname" class="alert alert-danger" style="">{!! Session::get('empty_lastname') !!}</div>
        @endif
        @if (Session::has('invalid_contact'))
            <div id="invalid_contact" class="alert alert-danger" style="">{!! Session::get('invalid_contact') !!}</div>
        @endif
        @if (Session::has('password_short'))
            <div id="password_short" class="alert alert-danger" style="">{!! Session::get('password_short') !!}</div>
        @endif
        @if (Session::has('new_and_confirm_mismatch'))
            <div id="new_and_confirm_mismatch" class="alert alert-danger" style="">{!! Session::get('new_and_confirm_mismatch') !!}</div>
        @endif
        @if (Session::has('new_password_empty'))
            <div id="new_password_empty" class="alert alert-danger" style="">{!! Session::get('new_password_empty') !!}</div>
        @endif
        @if (Session::has('old_current_mismatch'))
            <div id="old_current_mismatch" class="alert alert-danger" style="">{!! Session::get('old_current_mismatch') !!}</div>
        @endif
        @if (Session::has('old_blank'))
            <div id="old_blank" class="alert alert-danger" style="">{!! Session::get('old_blank') !!}</div>
        @endif
=======
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
      <div class="panel panel-default">

        <div class="panel-heading" style="padding-bottom: 0;padding-top: 0">
          <h3 >Edit Profile</h3>
        </div>

        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="panel-body">
<<<<<<< HEAD
          <form id='formCheckPassword' class="form-horizontal" method="POST" action="{{ url('EditProfile') }}">
            {{ csrf_field() }}
              <input id="user_id" name="user_id" type="hidden" value="{{ $user->id }}">
            <div class="form-group">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">
=======

          <form class="form-horizontal" method="POST" action="{{ url('EditProfile') }}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="email" class="col-md-4 control-label">E-Mail Address</label>
              <div class="col-md-6">

>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
                <input id="email" type="email" class="form-control" name="email" value="<?php echo ($user['email']); ?>" readonly="true">
              </div>
            </div>

            <div class="form-group">
              <label for="departmentName" class="col-md-4 control-label">Department</label>
              <div class="col-md-6">

<<<<<<< HEAD
                <input id="departmentName" type="text" class="form-control" name="departmentName" value="<?php echo ($departmentname); ?>" >
=======
                <input id="departmentName" type="departmentName" class="form-control" name="departmentName" value="<?php echo ($user['departmentName']); ?>" >
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
              </div>
            </div>
            <div class="form-group">
              <label for="firstname" class="col-md-4 control-label">First Name</label>
              <div class="col-md-6">

<<<<<<< HEAD
                <input id="firstname" type="text" class="form-control" name="firstname" value="<?php echo ($user['firstname']); ?>">
=======
                <input id="firstname" type="firstname" class="form-control" name="firstname" value="<?php echo ($user['firstname']); ?>">
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
              </div>
            </div>
            <div class="form-group">
              <label for="lastname" class="col-md-4 control-label">Last Name</label>
              <div class="col-md-6">

<<<<<<< HEAD
                <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo ($user['lastname']); ?>">
              </div>
            </div>

            <div class="form-group{{ $errors->has('contactno') ? ' has-error' : '' }}">
              <label for="contactno" class="col-md-4 control-label">Contact No.</label>
              <div class="col-md-6">

                <input id="contactno" type="text" class="form-control" name="contactno" value="<?php echo ($user['contactno']); ?>">
                @if ($errors->has('contactno'))
                  <span class="help-block">
                    <strong>{{ $errors->first('contactno') }}</strong>
                  </span>
                @endif
=======
                <input id="lastname" type="lastname" class="form-control" name="lastname" value="<?php echo ($user['lastname']); ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="contactno" class="col-md-4 control-label">Contact No.</label>
              <div class="col-md-6">

                <input id="contactno" type="contactno" class="form-control" name="contactno" value="<?php echo ($user['contactno']); ?>">
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <p> <strong>Note:</strong> 10-digit US number</p>
              </div>
            </div>
<<<<<<< HEAD
            <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">Old Password</label>

              <div class="col-md-6">
                <input id="password_old" type="password" class="form-control" name="old">

                @if ($errors->has('old'))
                  <span class="help-block">
                    <strong>{{ $errors->first('old') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="col-md-4 control-label">New Password</label>
              <div class="col-md-6">
                <input id="password_new" type="password" class="form-control" name="password">
                @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              <label for="password-confirm" class="col-md-4 control-label">Confirm New Password</label>
              <div class="col-md-6">
                <input id="password_new_confirm" type="password" class="form-control" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                  </span>
                @endif
              </div>
            </div>
=======
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                          Save Changes
                </button>
              </div>
            </div>
          </form>
        </div>

      </div>
<<<<<<< HEAD
=======
    <!-- After user submits request -->
    @if($Profilesubmitted == 'Yes')
      <div class="row">
        <div class="alert alert-success alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Profile updated successfully.
        </div>
      </div>
    @endif
>>>>>>> 85bfc84ff508f6d8adcc7c0a4043b6c7ac1e5f79
    </div>
  </div>
  @endsection

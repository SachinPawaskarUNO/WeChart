@foreach($notifications as $feedback)
<a href="#">{{$feedback->feedback}}{{$feedback->firstname}}{{$feedback->lastname}}{{$feedback->first_name}}{{$feedback->last_name}}</a>
@endforeach
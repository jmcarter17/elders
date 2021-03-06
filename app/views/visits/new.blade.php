<?php 

$visited_array = array('1' => 'Yes', '0' => 'No');

foreach ( $teams as $team ) {
	$teams_array[$team->id] = $team->senior->first_name . ' ' .$team->senior->last_name . ' and ' . $team->junior->first_name .' ' . $team->junior->last_name;
}

foreach ($homes as $home) {
	$home_array[$home->id] = $home->name; 
}

?>

@section('content')
	<h3>Monthly Home teaching report</h3>
	{{ Form::open('visits', 'POST', array('class'=>'form')) }}
		{{Form::label('family', 'Family Name')}}
		{{Form::select('family', $home_array)}} <br>
		{{Form::label('team', "Home Teaching team")}}
		{{Form::select('team', $teams_array)}}
		{{Form::label('visited', "Did you visit this family during this month ?")}}
		{{Form::select('visited', $visited_array)}} <br>
		{{Form::label('status', 'How are they doing ?')}}
		{{Form::text('status')}} <br>
		{{Form::label('message', 'What was the message you tought ?')}}
		{{Form::textarea('message')}} <br>
		{{Form::label('issues', 'What are the main issues the family is facing ?')}}
		{{Form::textarea('issues')}} <br>
		{{Form::label('visit_date', 'What was the exact date of your visit ?')}}
		{{Form::text('visit_date', '', array('class' => 'datepicker'))}} <br>
		{{Form::submit('Submit Report', array('class'=>'btn'))}}
	{{ Form::close() }}
@stop
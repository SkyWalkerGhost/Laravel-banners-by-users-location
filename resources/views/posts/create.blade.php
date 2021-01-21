@extends('layouts.app')
	
	@section('content')
		        
        <h1 class="h1"> Create </h1>	
		<hr class="mb-5">
        
        @include('include.messages')

        {!! Form::open(['action' => 'PostController@store', 'method' => 'POST']) !!}

            
            <div class="form-group">
                {{ Form::label('title', 'IP Address', ['class' => 'font-weight-bold']) }}
                {{ Form::text('ip', old('ip'), ['class' => 'form-control', 'placeholder' => 'Enter IP Address e.g 127.0.0.1']) }} 
            </div>
            
            <div class="form-group">
				{{ Form::submit('Add Data', ['class' => 'btn btn-primary btn-sm']) }}
            </div>
            

			<div class="form-group">
				<a href="{{route('index')}}" class="btn btn-default bg-dark text-white">
					<i class="fa fa-arrow-circle-left"></i>
					Go Back
				</a>
			</div>

        {!! Form::close() !!}


	@stop
@extends('layouts.app')
	
	@section('content')
        
        <h1 class="h1"> Update Single Data </h1>	
		<hr class="mb-5">
        
        @include('include.messages')

        {!! Form::open(['action' => ['PostController@update', $EditSingleData->id], 'method' => 'PUT']) !!}
        
        <div class="row">

            <div class="col-md-6">
                    <div class="form-group">
                    {!! Form::label('title', 'Country Name', ['class' => 'font-weight-bold']) !!}
                    {!! Form::text('country', $EditSingleData->country, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('title', 'Country Name', ['class' => 'font-weight-bold']) !!}
                    {!! Form::text('city', $EditSingleData->city, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="col-md-2">
                <a href="{{route('index')}}" class="btn btn-default btn-xs bg-dark text-white">
                    <i class="fa fa-arrow-circle-left"></i>
                    Go Back
                </a>
            </div>
            
            <div class="col-md-10">
                <div class="form-group">
                    {{ Form::button('<i class="fa fa-refresh"></i> Update Data', ['type' => 'submit', 'class' => 'btn btn-success btn-xs'] )  }}

                </div>
            </div>
            
        </div>

        {!! Form::close() !!}



	@stop
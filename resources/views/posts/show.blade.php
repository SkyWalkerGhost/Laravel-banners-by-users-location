@extends('layouts.app')


    @section('content')
        
        <h1 class="h1"> Show Single Data </h1>	
		<hr class="mb-5">


        <div class="row">
            
            <div class="col-md-6">
                <strong> IP Address: </strong>
            </div>
            
            <div class="col-md-6 mb-3">
                <span> {{ $ShowSingleData->ip }} </span>
            </div>
            
            <div class="col-md-6">
                <strong> Country: </strong>
            </div>
            
            <div class="col-md-6 mb-3">
                <span> {{ $ShowSingleData->country }} </span>
            </div>
            
            <div class="col-md-6">
                <strong> City: </strong>
            </div>
            
            <div class="col-md-6 mb-3">
                <span> {{ $ShowSingleData->city }} </span>
            </div>
            
            <div class="col-md-6">
                <strong> Operating System: </strong>
            </div>
            
            <div class="col-md-6 mb-3">
                <span> {{ $ShowSingleData->os }} </span>
            </div>
            
            <div class="col-md-6">
                <strong> Browser: </strong>
            </div>
            
            <div class="col-md-6 mb-5">
                <span> {{ $ShowSingleData->browser }} </span>
            </div>
            
            <div class="col-md-6 mb-5">
                <a href="{{ route('index') }}" class="btn btn-default btn-dark btn-sm" >
                    <i class="fa fa-arrow-circle-left"></i>
                    Go Back
                </a>
            </div>
            
        </div>

	@stop
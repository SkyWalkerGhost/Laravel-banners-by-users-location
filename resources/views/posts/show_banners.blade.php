@extends('layouts.app')


    @section('content')
        
        <h1 class="h1"> Show Single Banners </h1>	
		<hr class="mb-5">


        <div class="row">
            
              
            <div class="col-md-6">
                <strong> Target Country: </strong>
            </div>
            
            <div class="col-md-6 mb-3">
                <span> {{ $ShowSingleBanners->target_country }} </span>
            </div>
            
            <div class="col-md-6">
                <strong> Target City: </strong>
            </div>
            
            <div class="col-md-6 mb-3">
                <span> {{ $ShowSingleBanners->target_city }} </span>
            </div>
            
            <div class="col-md-6">
                <strong> Target Operating System: </strong>
            </div>
            
            <div class="col-md-6 mb-3">
                <span> {{ $ShowSingleBanners->target_os }} </span>
            </div>
            
            <div class="col-md-6">
                <strong> Banner: </strong>
            </div>
            
            <div class="col-md-6 mb-5">
                <span> {{ $ShowSingleBanners->browser }} </span>
				<img src="../storage/{{ str_replace("public/", '', $ShowSingleBanners->banner_image) }}" alt="" style="width: 100%;">

            </div>
            
            <div class="col-md-6 mb-5">
                <a href="{{ route('uploaded_baners') }}" class="btn btn-default btn-dark btn-sm" >
                    <i class="fa fa-arrow-circle-left"></i>
                    Go Back
                </a>
            </div>
            
        </div>

	@stop
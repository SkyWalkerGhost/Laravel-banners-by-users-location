@extends('layouts.app')

	@section('content')
	
		<div class="container">
			
			<h1 class="h1"> Welcome Page To Visitors </h1>
			<hr>

			@include('include.messages')

			<div class="row mt-5">
				<div class="col-md-12">
					@if(count($ShowBannerToUsers) > 0)
						
						@foreach($ShowBannerToUsers as $banner)
							<img src="storage/{{ str_replace("public/", '', $banner->banner_image) }}" alt="" style="width: 100%; height: auto;">
						@endforeach
						
						@else
						
						<div class="text-center" style="letter-spacing: 30px; font-size: 3.5rem; border: 5px double black">
							BANNER PLACE
							<p> 1220 x 124 </p>
						</div>

					@endif
				</div>
			</div>

		</div>

	@endsection

@extends('layouts.app')
	
	@section('content')
		
		<h1 class="h1"> Banners </h1>	
		<hr class="mb-5">

		@include('include.messages')

		<div class="table-responsive" style="height: 500px;">

		@if(count($UploadedBanner) > 0)

			<table class="table table-hover table-head-fixed text-nowrap">
				
				<thead class="thead-dark">
					<tr>
						<th> ID </th>
						<th> IMG </th>
						<th> Country </th>
						<th> City </th>
						<th> OS </th>
						<th> User ID </th>
						<th> Visit </th>
						<th> Show </th>
						<th> Delete </th>
					</tr>
				</thead>

				<tbody>
					@foreach($UploadedBanner as $ID => $banners)
						<tr>
                            <td> {{ $ID + 1 }} </td>
                            <td> <img src="storage/{{ str_replace("public/", '', $banners->banner_image) }}" alt="" style="width: 100%;"> </td>
							<td> {{ $banners->target_country }} </td>
							<td> {{ $banners->target_city }} </td>
							<td> {{ $banners->target_os }} </td>
							<td> {{ $banners->user_id }} </td>
							<td> {{ $banners->created_at }} </td>

							
							<td>
								<a href="{{ route('show_banners', $banners->id) }}" class="btn btn-primary text-uppercase btn-sm"> 
									<i class="fa fa-eye"></i>  </a>
							</td>
							
							@if(!Auth::guest())
								@if(Auth::user()->id == $banners->user_id)
								

								<td>

									<button type="button" class="btn btn-danger btn-sm text-uppercase" data-toggle="modal" data-target="#action_{{ $banners->id }}">
									<i class="fa fa-trash"></i> 
									</button>

									<div class="modal fade" id="action_{{ $banners->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
											
											<div class="modal-header">
												<h5 class="modal-title" id="staticBackdropLabel"> Do you wont to delete this Banners ? </h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											
											<div class="modal-body">
												<img 	src="storage/{{ str_replace("public/", '', $banners->banner_image) }}" 
														alt="" 
														style="width: 100%;">
											</div>
											
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal"> 
														<i class="fa fa-times"></i> Close 
													</button>
												
													{!! Form::open(['action' => ['BannerController@destroy', $banners->id], 'method' => 'POST' ]) !!}
													{!! Form::hidden('_method', 'DELETE') !!}
													{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
													{!! Form::close() !!}
												
												</div>
											</div>
										</div>
									</div>
									
									
								</td>

								@endif
							@endif
							
							
						</tr>
					@endforeach
					
					
				</tbody>
				
			</table>
			
		@else
			<div class="alert alert-danger">
				<i class="fa fa-exclamation-circle"></i> Banners Not Found
			</div>
		@endif
		</div>

	@stop
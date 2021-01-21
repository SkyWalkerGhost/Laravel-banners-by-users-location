@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-5">
            <div class="card">
                <div class="card-header"> <i class="fa fa-home"></i> {{ __('Dashboard') }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-5">
            <h1 class="h1"> <i class="fa fa-bar-chart"></i> All Visitors ({{ count($my_added_data) }}) </h1>
            <hr>
        </div>


        <div class="col-md-12">

            @include('include.messages')

            <div class="table-responsive" style="height: 500px;">
            @if (count($my_added_data) > 0)

                <table class="table table-hover table-head-fixed text-nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th> ID </th>
                            <th> IP </th>
                            <th> Country </th>
                            <th> City </th>
                            <th> OS </th>
                            <th> Browser </th>
                            <th> Visit time </th>
                            <th> Edit </th>
                            <th> Delete </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($my_added_data as $ID => $data)
                            <tr>
                                <td> {{ $ID + 1 }} </td>
                                <td> {{ $data->ip }} </td>
                                <td> {{ $data->country }} </td>
                                <td> {{ $data->city }} </td>
                                <td> {{ $data->os }} </td>
                                <td> {{ $data->browser }} </td>
                                <td> {{ $data->created_at }} </td>
                                
                                
                                <td> 
                                    <a href="{{route('edit', $data->id)}}" class="btn btn-primary btn-sm"> 
                                        <i class="fa fa-pencil"></i> Edit 
                                    </a> 
                                </td>

                                
							    <td>
                                    
                                    <button type="button" class="btn btn-danger btn-sm text-uppercase" data-toggle="modal" data-target="#action_{{ $data->id }}">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                    
                                    <div class="modal fade" id="action_{{ $data->id }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel"> Do you wont to delete ? </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                            <div class="modal-body">
                                                {{ $data->id }}
                                            </div>
                                            
                                            <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> 
                                                        <i class="fa fa-times"></i> Close 
                                                    </button>
                                                
                                                    {!! Form::open(['action' => ['PostController@destroy', $data->id], 'method' => 'POST' ]) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                                    {!! Form::close() !!}
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            

                            </tr>
                            @endforeach
                    </tbody>
                        
                </table>
                
                @else
                    <p> Visitors Not Found </p>
                @endif
            </div>

        </div>
        
    </div>
</div>
@endsection

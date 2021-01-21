@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8 mb-5">
            <h1 class="h1"> <i class="fa fa-cloud-upload"></i> Banner Upload </h1>
            <hr>
        </div>


        <div class="col-md-8">

            @include('include.messages')

            {!! Form::open(['action' => 'BannerController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for=""> Target Country </label>
                            <select name="target_country" class="form-control" id="">
                                @foreach($TargetCountryData AS $target_country)
                                <option value="{{ $target_country->country }}"> {{ $target_country->country }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for=""> Target City </label>
                            <select name="target_city" class="form-control" id="">
                                @foreach($TargetCityData AS $target_city)
                                    <option value="{{ $target_city->city }}"> {{ $target_city->city }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for=""> Target Operating System </label>
                            <select name="target_os" class="form-control" id="">
                                @foreach($TargetOsData AS $target_os)
                                   <option value="{{ $target_os->os }}"> {{ $target_os->os }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            {{ Form::label('title', 'Placement Period') }}
                            <input type="date" name="placement_period" class="form-control">
                        </div>
                    </div>


                    <div class="col-md-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="banner_upload" class="custom-file-input">
                                {{-- {{ Form::file('banner_upload', old('banner_upload'), ['class' => 'custom-file-input']) }}  --}}
                                {{ Form::label('title', 'Max Size: 1MB', ['class' => 'custom-file-label']) }}
                            </div>
                        </div>
                    </div>


                    
                    <div class="col-md-2">
                        <div class="form-group">
                            {{ Form::button('<i class="fa fa-cloud-upload"></i> Upload', ['type' => 'submit', 'class' => 'btn btn-success btn-xs'] )  }}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <a href="{{route('uploaded_baners')}}" class="btn btn-default bg-dark text-white">
                                <i class="fa fa-arrow-circle-left"></i>
                                Go Back
                            </a>
                        </div>
                    </div>
                    
                </div>
            {!! Form::close() !!}

        </div>
        
    </div>
</div>
@endsection

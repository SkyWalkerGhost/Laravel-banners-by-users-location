@if(count($errors) > 0)

    @foreach($errors->all() as $error_message)
        <div class="alert alert-danger">
            {{ $error_message }}
        </div>  

    @endforeach
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


@if(session('success'))
    <div class="alert alert-success">
        <i class="fa fa-check"></i>    {{ session('success') }}
    </div>
@endif

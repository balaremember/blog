@if(Session::has('status'))

    <div class="alert alert-success text-center" role="alert">
        {{ Session::get('status') }}
    </div>
    
@endif

@if(count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        Errors:
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
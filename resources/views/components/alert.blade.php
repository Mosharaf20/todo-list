<div>
    @if(Session::has('message'))

        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('error'))
            {{ $slot }}
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
</div>

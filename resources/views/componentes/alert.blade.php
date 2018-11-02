@foreach (['danger', 'warning', 'success', 'info','error'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert {{ $msg }} text-center">{{ Session::get('alert-' . $msg) }} <a href="#" class="close"
            data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
@endforeach

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

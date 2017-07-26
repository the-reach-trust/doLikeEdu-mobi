@if ($errors->has($tag))
    <span class="help-block">
        @foreach ($errors->get($tag) as $error)
            <strong>{{ $error }}</strong><br/>
        @endforeach
    </span>
@endif

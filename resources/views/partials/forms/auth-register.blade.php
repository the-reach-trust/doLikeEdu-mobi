	<div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
        {{ Form::label('name', 'name', ['class' => 'control-label']) }}
        {{ Form::text('name',  old('name', (isset($name) ? $name : null)) , ['class' => 'form-control','required']) }}
        @include('partials.elems.formerrors', ['tag' => 'name'])
	</div>

	@include('partials.forms.auth-login')
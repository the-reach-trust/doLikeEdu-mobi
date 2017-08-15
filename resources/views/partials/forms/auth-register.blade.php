	<div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
		{{ Form::text('name', old('name', (isset($name) ? $name : null)) , [
			'class' => 'form-control',
			'placeholder' => 'full name',
			'required'
		]) }}
        @include('partials.elems.formerrors', ['tag' => 'name'])
	</div>

	@include('partials.forms.auth-login')
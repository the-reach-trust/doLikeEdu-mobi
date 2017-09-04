	<div class="form-group has-feedback {{ $errors->has('fullname') ? 'has-error' : '' }}">
		{{ Form::text('fullname', old('fullname', (isset($fullname) ? $fullname : null)) , [
			'class' => 'form-control',
			'placeholder' => 'Full Name',
			'required'
		]) }}
        @include('partials.elems.formerrors', ['tag' => 'fullname'])
	</div>

	@include('partials.forms.auth-login')
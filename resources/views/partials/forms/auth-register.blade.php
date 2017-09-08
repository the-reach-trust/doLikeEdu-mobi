	<div class="form-group has-feedback {{ $errors->has('firstname') ? 'has-error' : '' }}">
		{{ Form::text('firstname', old('firstname', (isset($firstname) ? $firstname : null)) , [
			'class' => 'form-control',
			'placeholder' => 'First Name',
			'required'
		]) }}
	@include('partials.elems.formerrors', ['tag' => 'firstname'])
	</div>

		<div class="form-group has-feedback {{ $errors->has('lastname') ? 'has-error' : '' }}">
		{{ Form::text('lastname', old('lastname', (isset($lastname) ? $lastname : null)) , [
			'class' => 'form-control',
			'placeholder' => 'Last Name',
			'required'
		]) }}
	@include('partials.elems.formerrors', ['tag' => 'lastname'])
	</div>

	@include('partials.forms.auth-login')
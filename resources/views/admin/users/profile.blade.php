@extends('admin.layout.admin_layout')

@section('content')
<!-- BEGIN: MAIN CONTENT
    ==================================================== -->
<div class="g-main-content-sm">
	<!-- Begin: Row -->
	<div class="row">
		<!-- Begin: g-form-wrapper -->
		<div class="g-form-wrapper">
			@if (session()->has('message_success'))
			<!-- Begin: Alert Success -->
			<div class="alert alert-success" role="alert" style="background-color: #def4e8; border-color: #e6f8ee;">
				<h6 style="color: #257b50; font-weight: 400">{{ session()->get('message_success') }}</h6>
			</div>
			<!-- End: Alert Success -->
			@endif
			<h4>Informações Pessoais</h4>
			<!-- BEGIN: EDIT PROFILE FORM  -->
			<form action="/admin/users/update" id="p-edit-profile-form" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

				<!-- Begin: form-group -->
				<div class="form-group">
					<label for="job">Função</label>
					<input type="text" name="job" class="form-control brd md" id="job"
						value="{{ old('job', auth()->user()->job) }}" />
					@error('job')
					<small class="form-text text-danger">{{ $message }}</small>
					@enderror
				</div>
				<!-- End: form-group -->

				<!-- Begin: form-group -->
				<div class="form-group">
					<label for="description">Descrição</label>
					<textarea name="description" class="form-control textarea brd md"
						id="description">{{ old('description', auth()->user()->description) }}</textarea><small
						class="form-text text-danger">{!! $errors->first('description') !!}</small>
				</div>
				<!-- End: form-group -->

				<!-- Begin: g-uploader -->
				<div class="g-uploader profile" style="margin-bottom: 8px;">
					<img src="{{ !empty(auth()->user()->media) ? asset('/storage/images/' . auth()->user()->media) : asset('/images/cat.jpg') }}"
						class="clickable" alt="upload image">
					<input type="file" name="media" class="photo empty" style="display: none">
					<input type="hidden" name="current_photo" value="{{ auth()->user()->media }}">
				</div>
				<small class="form-text text-danger mb-1">{!!$errors->first('photos') !!}</small>
				<!-- End: g-uploader -->

				<!-- Begin: form-row -->
				<div class="form-row">
					<!-- Begin: form-group -->
					<div class="form-group col-sm-12 col-md-5">
						<label for="first-name">Primeiro Nome</label>
						<input type="text" name="first_name" class="form-control brd md" id="first-name"
							value="{{ old('first_name', auth()->user()->first_name) }}">
					</div>
					<!-- End: form-group -->
					<!-- Begin: form-group -->
					<div class="form-group col-sm-12 col-md-7">
						<label for="last-name">Último Nome</label>
						<input type="text" name="last_name" class="form-control brd md" id="last-name"
							value="{{ old('last_name', auth()->user()->last_name) }}">
					</div>
					<!-- End: form-group -->
				</div>
				<!-- End: form-row -->
				<!-- Begin: form-row -->
				<div class="form-row">
					<!-- Begin: form-group -->
					<div class="form-group col-sm-12 col-md-7">
						<label for="email">E-Mail</label>
						<input type="text" name="email" class="form-control brd md" id="email"
							value="{{ old('email', auth()->user()->email) }}">
					</div>
					<!-- End: form-group -->
					<!-- Begin: form-group -->
					<div class="form-group col-sm-12 col-md-5">
						<label for="phone">Telefone</label>
						<input type="text" name="phone" class="form-control brd md" id="phone"
							value="{{ old('phone', auth()->user()->phone) }}">
					</div>
					<!-- End: form-group -->
				</div>
				<!-- End: form-row -->
				<button type="submit" class="btn btn-primary bbm">Atualizar Perfil</button>
			</form>
			<!-- END: EDIT PROFILE FORM  -->
		</div>
		<!-- End: g-form-wrapper -->
	</div>
	<!-- End: Row -->

	<!-- Begin: Row -->
	<div class="row">
		<!-- Begin: g-form-wrapper -->
		<div class="g-form-wrapper">
			<h4>Autenticação de dois fatores(2FA)</h4>
			@if(session('status') == 'two-factor-authentication-enabled')
			<div class="alert alert-success" role="alert">
				Autenticação de dois fatores ativada com sucesso.
			</div>
			<p>
				A autenticação de dois fatores foi ativada. Digitalize o seguinte código QR usando o aplicativo
				autenticador do seu
				telefone.
			</p>
			<!-- Begin: s-qrcode -->
			<div class="s-qrcode">
				{!! auth()->user()->twoFactorQrCodeSvg() !!}
			</div>
			<!-- End: s-qrcode -->
			<p>
				Guarde estes códigos de recuperação num gestor de palavras-passe seguro. Eles podem ser usados para
				recuperar o acesso à
				sua conta.
			</p>
			<!-- Begin: s-recovery-codes -->
			<div class="s-recovery-codes">
				@foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
				{{ trim($code) }} <br>
				@endforeach
			</div>
			<!-- End: s-recovery-codes -->
			@endif

			@if( ! auth()->user()->two_factor_secret)
			<form action="{{ url('/user/two-factor-authentication') }}" method="POST">
				@csrf
				<button type="submit" class="btn btn-info bbm btn-block">Ativar 2FA</button>
			</form>
			@else
			<form action="{{ url('/user/two-factor-authentication') }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-primary bbm btn-block">Desativar 2FA</button>
			</form>
			@endif

		</div>
		<!-- End: g-form-wrapper -->
	</div>
	<!-- End: Row -->

	<!-- Begin: Row -->
	<div class="row">
		<!-- Begin: g-form-wrapper -->
		<div class="g-form-wrapper">
			<h4>Alterar Palavra-passe</h4>
			@if(session('status') == 'password-updated')
			<div class="alert alert-success" role="alert">
				A palavra-passe foi atualizada com sucesso.
			</div>
			@endif
			<!-- BEGIN: ALTER PASSWORD FORM  -->
			<form action="{{ route('user-password.update')}}" id="p-alter-password-form" method="POST">
				@csrf
				@method('PUT')

				<!-- Begin: form-group -->
				<div class="form-group">
					<label for="old-password">Senha Antiga</label>
					<input type="password" name="current_password" class="form-control brd md" id="old-password">
					@error('current_password')
					<small class="form-text text-danger">{{ $message }}</small>
					@enderror
				</div>
				<!-- End: form-group -->
				<!-- Begin: form-group -->
				<div class="form-group">
					<label for="new-password">Senha Nova</label>
					<input type="password" name="password" class="form-control brd md" id="new-password">
					@error('password')
					<small class="form-text text-danger">{{ $message }}</small>
					@enderror
				</div>
				<!-- End: form-group -->
				<!-- Begin: form-group -->
				<div class="form-group">
					<label for="confirm-password">Confirmar Senha</label>
					<input type="password" name="password_confirmation" class="form-control brd md"
						id="confirm-password">
					@error('password_confirmation')
					<small class="form-text text-danger">{{ $message }}</small>
					@enderror
				</div>
				<!-- End: form-group -->
				<button type="submit" class="btn btn-primary bbm">Guardar</button>
			</form>
			<!-- END: ALTER PASSWORD FORM  -->
		</div>
		<!-- End: g-form-wrapper -->
	</div>
	<!-- End: Row -->
</div>
<!-- END: MAIN CONTENT  -->
@endsection
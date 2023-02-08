@extends('auth.layout.auth_layout')

<!-- BEGIN: AUTHENTICATION
    ==================================================== -->
<div class="g-authentication" style="background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.35), rgba(1, 1, 1, 0.40)), url({{ asset('/images/reset.svg') }})">
    <!-- Begin: s-password-reset-form -->
    <form action="{{ route('password.update') }}" class="g-auth-form g-create-edit-form" class="shadow" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token')}}">
        <!-- Begin: s-auth-brand -->
        <div class="s-auth-brand">
            <img src="{{ asset('/images/company.svg') }}" alt="company logo">
        </div>
        <!-- End: s-auth-brand -->
        <!-- Begin: s-auth-info -->
        <div class="s-auth-info">
            <small>Por favor insere a senha nova.</small>
        </div>
        <!-- End: s-auth-info -->
        <!-- Begin: form-group -->
        <div class="form-group">
            <label for="user-email">Email</label>
            <input type="text" name="email" class="form-control brd md" id="user-email" value="{{ $request->email }}">
        </div>
        <!-- End: form-group -->
        <!-- Begin: form-group -->
        <div class="form-group">
            <label for="password">Senha Nova</label>
            <input type="password" name="password" class="form-control brd md" id="password">
            @error('password')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <!-- End: form-group -->
        <!-- Begin: form-group -->
        <div class="form-group">
            <label for="confirm-password">Confirmar Senha</label>
            <input type="password" name="password_confirmation" class="form-control brd md" id="confirm-password">
        </div>
        <!-- End: form-group -->
        <!-- End: form-group -->
        <button type="submit" class="btn btn-primary bbm">Atualizar</button>
    </form>
    <!-- End: s-password-reset-form -->
</div>
<!-- END: AUTHENTICATION  -->

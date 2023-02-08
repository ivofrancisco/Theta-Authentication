@extends('auth.layout.auth_layout')

<!-- BEGIN: AUTHENTICATION
==================================================== -->
<div class="g-authentication login" style="background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.35), rgba(1, 1, 1, 0.40)), url({{ asset('/images/confirm.svg') }})">
    <!-- Begin: s-login-user-form -->
    <form action="{{ url('user/confirm-password') }}" class="g-auth-form g-create-edit-form" method="POST">
        @csrf
        <!-- Begin: s-auth-brand -->
        <div class="s-auth-brand">
            <img src="{{ asset('/images/company.svg') }}" alt="company logo">
        </div>
        <!-- End: s-auth-brand -->
        <!-- Begin: form-group -->
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form-control brd md" id="password">
            @error('password')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <!-- End: form-group -->
        <button type="submit" class="btn btn-primary bbm">Entrar</button>
    </form>
    <!-- End: s-login-user-form -->
</div>
<!-- END: AUTHENTICATION  -->

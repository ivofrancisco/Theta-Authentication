@extends('auth.layout.auth_layout')

<!-- BEGIN: AUTHENTICATION
==================================================== -->
<div class="g-authentication login" style="background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.35), rgba(1, 1, 1, 0.40)), url({{ asset('/images/login.svg') }})">
    <!-- Begin: s-login-user-form -->
    <form action="{{ route('login') }}" class="g-auth-form g-create-edit-form" method="POST">
        @csrf
        <!-- Begin: s-auth-brand -->
        <div class="s-auth-brand">
            <img src="{{ asset('/images/company.svg') }}" alt="company logo">
        </div>
        <!-- End: s-auth-brand -->
        <!-- Begin: form-group -->
        <div class="form-group">
            <label for="user-email">Email</label>
            <input type="text" name="email" class="form-control brd md" id="user-email">
            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <!-- End: form-group -->
        <!-- Begin: form-group -->
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" class="form-control brd md" id="password">
            @error('password')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <!-- End: form-group -->
        <!-- Begin: s-forgot-keep -->
        <div id="s-forgot-keep">
            <div class="checkbox-group forgot">
                <input
                    type="checkbox"
                    class="checkbox-item brd sm"
                    name="remember"
                    id="remember"
                />
                <label for="remember">Lembrar-me</label>
            </div>
            <a href="forgot-password" class="p3">
                Esqueceste a Senha?</a
            >
        </div>
        <!-- End: Forgot Keep -->
        <button type="submit" class="btn btn-primary bbm">Entrar</button>
        <a href="/register" class="btn btn-light bbm">Registar-se</a>
    </form>
    <!-- End: s-login-user-form -->
</div>
<!-- END: AUTHENTICATION  -->

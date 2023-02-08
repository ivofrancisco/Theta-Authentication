@extends('auth.layout.auth_layout')

<!-- BEGIN: AUTHENTICATION
==================================================== -->
<div class="g-authentication register" style="background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.35), rgba(1, 1, 1, 0.40)), url({{ asset('/images/register.svg') }})">
    <!-- Begin: s-register-form -->
    <form action="{{ route('register') }}" class="g-auth-form g-create-edit-form" method="POST">
        @csrf
        <!-- Begin: s-auth-brand -->
        <div class="s-auth-brand">
            <img src="{{ asset('/images/company.svg') }}" alt="company logo">
        </div>
        <!-- End: s-auth-brand -->
        <!-- Begin: form-row -->
        <div class="form-row">
            <!-- Begin: form-group -->
            <div class="form-group col-sm-12 col-md-6">
                <label for="first-name">Primeiro Nome</label>
                <input type="text" name="first_name" class="form-control brd md" id="first-name">
                @error('first_name')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- End: form-group -->
            <!-- Begin: form-group -->
            <div class="form-group col-sm-12 col-md-6">
                <label for="last-name">Último Nome</label>
                <input type="text" name="last_name" class="form-control brd md" id="last-name">
                @error('last_name')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- End: form-group -->
        </div>
        <!-- End: form-row -->
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
        <!-- Begin: form-group -->
        <div class="form-group">
            <label for="password-confirm">Confirmar Senha</label>
            <input type="password" name="password_confirmation" class="form-control brd md" id="password-confirm">
        </div>
        <!-- End: form-group -->
        <button type="submit" class="btn btn-primary bbm">Registar-se</button>
        <a href="/login" class="btn btn-light bbm">Entrar</a>
    </form>
    <!-- End: s-register-form -->
</div>
<!-- END: AUTHENTICATION  -->


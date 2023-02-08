@extends('auth.layout.auth_layout')

<!-- BEGIN: AUTHENTICATION
    ==================================================== -->
<div class="g-authentication" style="background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.35), rgba(1, 1, 1, 0.40)), url({{ asset('/images/forgot.svg') }})">
    <!-- Begin: s-password-forgot-form -->
    <form action="{{ route('password.request') }}" class="g-auth-form g-create-edit-form" class="shadow" method="POST">
        @csrf
        <!-- Begin: s-auth-brand -->
        <div class="s-auth-brand">
            <img src="{{ asset('/images/company.svg') }}" alt="company logo">
        </div>
        <!-- End: s-auth-brand -->
        <!-- Begin: s-auth-info -->
        <div class="s-auth-info">
            <small>Por favor coloque o E-Mail.</small>
        </div>
        <!-- End: s-auth-info -->
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <!-- Begin: form-group -->
        <div class="form-group">
            <label for="user-email">Email</label>
            <input type="text" name="email" class="form-control brd md" id="user-email">
            @error('email')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <!-- End: form-group -->
        <button type="submit" class="btn btn-primary bbm">Enviar</button>
    </form>
    <!-- End: s-password-forgot-form -->
</div>
<!-- END: AUTHENTICATION  -->

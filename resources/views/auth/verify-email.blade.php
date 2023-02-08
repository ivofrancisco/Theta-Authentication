@extends('auth.layout.auth_layout')

<!-- BEGIN: AUTHENTICATION
==================================================== -->
<div class="g-authentication" style="background-image: linear-gradient(135deg, rgba(0, 0, 0, 0.35), rgba(1, 1, 1, 0.40)), url({{ asset('/images/verify.jpg') }})">
    <!-- Begin: s-verification-sern-form -->
    <form action="{{ route('verification.send') }}" class="g-auth-form g-create-edit-form" method="POST">
    @csrf
    <!-- Begin: s-auth-brand -->
        <div class="s-auth-brand">
            <img src="{{ asset('/images/company.svg') }}" alt="company logo">
        </div>
        <!-- End: s-auth-brand -->
        <!-- Begin: s-auth-info -->
        <div class="s-auth-info">
            <small>Olá, bem-vindo(a).</small>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <p class="g-paragraph-1">Tem de confirmar o seu endereço de E-Mail. Por verifique a sua caixa de correio.</p>
        <!-- End: s-auth-info -->

        <button type="submit" class="btn btn-primary bbm btn-block">Re-enviar E-mail</button>
    </form>
    <!-- End: s-verification-send-form -->
</div>
<!-- END: AUTHENTICATION  -->

@extends('auth.layout.auth_layout')

<!-- BEGIN: AUTHENTICATION
==================================================== -->
<div class="g-authentication" style="display: flex; flex-direction: column">
    <h1>Welcome Back!</h1>

    <form action="{{ url('/user/two-factor-authentication') }}" method="POST" style="display: block">
        @csrf
        @if(auth()->user()->two_factor_secret)
        @method('DELETE')

        <div class="mb-5">
            {!! auth()->user()->twoFactorQrCodeSvg() !!}
        </div>

        <button class="btn btn-danger bbm btn-block">Disable 2fa</button>
        @else
        <button class="btn btn-primary bbm btn-block">Enable 2fa</button>
        @endif
    </form>
</div>
<!-- END: AUTHENTICATION  -->

<form action="" id="p-two-factor-form">
    <p>
        A autenticação de dois fatores foi ativada. Digitalize o seguinte código QR usando o aplicativo
        autenticador do seu
        telefone.
    </p>
    <!-- Begin: s-qrcode -->
    <div class="s-qrcode">

    </div>
    <!-- End: s-qrcode -->
    <p>
        Guarde estes códigos de recuperação num gestor de palavras-passe seguro. Eles podem ser usados para
        recuperar o acesso à
        sua conta.
    </p>
    <!-- Begin: s-recovery-codes -->
    <div class="s-recovery-codes">

    </div>
    <!-- End: s-recovery-codes -->
</form>
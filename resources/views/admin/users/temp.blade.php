@extends('admin.layout.admin_layout')

@section('content')
<!-- BEGIN: MAIN CONTENT
    ==================================================== -->
<div class="g-main-content">

    @include('admin.partials.alerts')

    @include('admin.partials.breadcrumbs')

    <!-- BEGIN: CONTENT
    ==================================================== -->
    <div class="g-content">
        <!-- Begin: Row -->
        <div class="row">
            <!-- Begin: col-sm-12 col-md-5 -->
            <div class="col-sm-12 col-md-5">
                <!-- BEGIN: PROFILE CARD
	            ==================================================== -->
                <div class="s-profile-card shadow-sm">
                    <!-- Begin: s-profile-head -->
                    <div class="s-profile-head"
                        style="background-image: linear-gradient(0deg, rgba(35, 44, 56, 0.35), rgba(69, 79, 92, 0.25)), url({{ asset('/images/profile-bg_01.jpg') }})">
                        <!-- Begin: g-profile-uploader -->
                        <div id="g-profile-uploader">
                            <!-- Begin: g-manage-photo -->
                            <div class="g-manage-photo editable shadow-sm">
                                <i class="icon-edit_05"></i>
                            </div>
                            <!-- End: g-manage-photo -->
                            @if($user->media)
                            <img src="/storage/images/{{ $user->media }}" class="clickable shadow" alt="upload image">
                            @else
                            <img src="/storage/images/cat.jpg" class="shadow-sm" alt="user">
                            @endif
                            <input type="file" name="media" form="edit-profile-form" style="display: none">
                            <input type="hidden" name="current_photo" form="edit-profile-form"
                                value="{{ $user->media }}">
                        </div>
                        <!-- End: g-profile-uploader -->

                    </div>
                    <!-- End: s-profile-head -->
                    <!-- Begin: s-profile-body -->
                    <div class="s-profile-body" style=" padding: 50px 23px 5px 23px;">
                        <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
                        <span class="mb-4">
                            @if($user->is_admin)
                            Admin
                            @else
                            Colaborador
                            @endif
                        </span>
                    </div>
                    <!-- End: s-profile-body -->
                    <!-- Begin: s-profile-footer -->
                    <div class="s-profile-footer">
                        <!-- Begin: s-profile-footer-item -->
                        <div class="s-profile-footer-item">
                            <h6>Telefone</h6>
                            <h4>{{ $user->phone ?? 'Não Adicionado' }}</h4>
                        </div>
                        <!-- End: s-profile-footer-item -->
                        <!-- Begin: s-profile-footer-item -->
                        <div class="s-profile-footer-item">
                            <h6>Email</h6>
                            <h4>{{ $user->email }}</h4>
                        </div>
                        <!-- End: s-profile-footer-item -->
                    </div>
                    <!-- End: s-profile-footer -->
                </div>
                <!-- END: PROFILE CARD -->
            </div>
            <!-- End: col-sm-12 col-md-5 -->

            <!-- Begin: col-sm-12 col-md-7 -->
            <div class="col-sm-12 col-md-7">
                <!-- DASHBOARD TABS
	                ==================================================== -->
                <div class="s-dashboard-tabs">
                    <!-- Begin: s-dsh-tabs-navbar -->
                    <div class="s-dsh-tabs-navbar">
                        <button class="btn btn-link s-dsh-tabs-link active">Editar Perfil</button>
                        <button class="btn btn-link s-dsh-tabs-link">Alterar Password</button>
                    </div>
                    <!-- End: s-dsh-tabs-navbar -->
                    <!-- Begin: s-dsh-tabs-content -->
                    <div class="s-dsh-tabs-content">
                        <!-- Begin: s-dsh-content-item -->
                        <div class="s-dsh-content-item opened">
                            <!-- Begin: edit-profile-form -->
                            <form action="/admin/users/update" id="edit-profile-form" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                <!-- Begin: form-row -->
                                <div class="form-row">
                                    <!-- Begin: form-group -->
                                    <div class="form-group col-sm-12 col-md-5">
                                        <label for="first-name">Primeiro Nome</label>
                                        <input type="text" name="first_name" class="form-control brd md" id="first-name"
                                            value="{{ old('first_name') ?? $user->first_name }}">
                                    </div>
                                    <!-- End: form-group -->
                                    <!-- Begin: form-group -->
                                    <div class="form-group col-sm-12 col-md-7">
                                        <label for="last-name">Último Nome</label>
                                        <input type="text" name="last_name" class="form-control brd md" id="last-name"
                                            value="{{ old('last_name') ?? $user->last_name }}">
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
                                            value="{{ old('email') ?? $user->email }}">
                                    </div>
                                    <!-- End: form-group -->
                                    <!-- Begin: form-group -->
                                    <div class="form-group col-sm-12 col-md-5">
                                        <label for="phone">Telefone</label>
                                        <input type="text" name="phone" class="form-control brd md" id="phone"
                                            value="{{ old('phone') ?? $user->phone }}">
                                    </div>
                                    <!-- End: form-group -->
                                </div>
                                <!-- End: form-row -->
                                <!-- Begin: form-group -->
                                <div class="form-group">
                                    <label for="job">Função</label>
                                    <input type="text" name="job" class="form-control brd md" id="job"
                                        value="{{ old('job') ?? $user->job }}">
                                </div>
                                <!-- End: form-group -->
                                <button type="submit" class="btn btn-primary bbm">Atualizar Perfil</button>
                            </form>
                            <!-- End: edit-profile-form -->
                        </div>
                        <!-- End: s-dsh-content-item -->
                        <!-- Begin: s-dsh-content-item -->
                        <div class="s-dsh-content-item">
                            <!-- Begin: edit-profile-form -->
                            <form action="{{ route('user-password.update')}}" id="alter-password-form" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Begin: form-group -->
                                <div class="form-group">
                                    <label for="old-password">Senha Antiga</label>
                                    <input type="password" name="current_password" class="form-control brd md"
                                        id="old-password">
                                    @error('current_password')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- End: form-group -->
                                <!-- Begin: form-group -->
                                <div class="form-group">
                                    <label for="new-password">Senha Nova</label>
                                    <input type="password" name="password" class="form-control brd md"
                                        id="new-password">
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
                                <button type="submit" class="btn btn-primary bbm">Atualizar Password</button>
                            </form>
                            <!-- End: edit-profile-form -->
                        </div>
                        <!-- End: s-dsh-content-item -->
                    </div>
                    <!-- End: s-dsh-tabs-content -->
                </div>
                <!-- END: DASHBOARD TABS -->
            </div>
            <!-- End: col-sm-12 col-md-7 -->

        </div>
        <!-- End: Row -->
    </div>
    <!-- END: CONTENT  -->

</div>
<!-- END: MAIN CONTENT  -->
@endsection
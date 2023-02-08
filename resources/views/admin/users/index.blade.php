@extends('admin.layout.admin_layout')

@section('content')
    <!-- BEGIN: MAIN CONTENT
    ==================================================== -->
    <div class="g-main-content">

    @include('admin.partials.breadcrumbs')

        <!-- BEGIN: CONTENT
        ==================================================== -->
        <div id="s-users-list" class="g-content card sm-card shadow-sm">
            <!-- Begin: card-header -->
            <div class="card-header border-0 py-3">
                <!-- Begin: card-title -->
                <div class="card-title">
                    <h4 class="card-label">Utilizadores</h4>
                    <span class="mt-3">Lista de Utilizadores Existentes</span>
                </div>
                <!-- End: card-title -->
            </div>
            <!-- End: card-header -->
            <!-- Begin: card-body -->
            <div class="card-body py-0">
                <!-- Begin: table g-table -->
                <table class="table g-table">
                    <!-- Begin: g-table-head -->
                    <thead class="g-table-head">
                    <!-- Begin: g-table-row -->
                    <tr class="g-table-row text-left">
                        <th class="pl-0">nome</th>
                        <th>função</th>
                        <th>acesso</th>
                        <th class="pr-0 text-right">gerir</th>
                    </tr>
                    <!-- Begin: g-table-row -->
                    </thead>
                    <!-- End: g-table-head -->
                    <!-- Begin: g-table-body -->
                    <tbody>
                        
                        @foreach( $users as $user )
                        <!-- Begin: g-table-row -->
                        <tr class="g-table-row">
                            <td class="pl-0 title">
                                <img src="/storage/images/{{ $user->media ?? 'cat.jpg' }}" class="shadow-sm" alt="users">
                                <span>{{ $user->first_name }} {{ $user->last_name }}</span>
                            </td>
                            <td>
                                {{ $user->job }}
                            </td>
                            <td>
                                @if($user->is_admin)
                                    Admin
                                @else
                                    Colaborador
                                @endif
                            </td>
                            <!-- Begin: manage -->
                            <td class="manage pr-0 text-right">
                                <!-- Begin: g-row-item-manager -->
                                <div class="g-row-item-manager">
                                    <i class="icon-dots_01 row-toggle"></i>
                                    <!-- Begin: Row Actions Menu -->
                                    <div class="g-row-actions-menu shadow">
                                        <a href="/admin/users/{{ $user->id }}/manage" data-toggle="modal" data-target="#contentAccessModal">Acesso</a>
                                        <form action="/admin/users/{{ $user->id }}/delete" class="item-delete" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-link">Apagar</button>
                                        </form>
                                    </div>
                                    <!-- End: g-row-actions-menu -->
                                </div>
                                <!-- End: g-row-item-manager -->
                            </td>
                            <!-- End: manage -->
                        </tr>
                        <!-- End: g-table-row -->
                    @endforeach

                    </tbody>
                    <!-- End: g-table-body -->
                </table>
                <!-- End: table g-table -->
            </div>
            <!-- End: card-body -->
        </div>
        <!-- END: CONTENT -->
    </div>
    <!-- END: MAIN CONTENT  -->

    <!-- BEGIN: CONTENT ACCESS MODAL
    ==================================================== -->
    <div class="modal fade" id="contentAccessModal" tabindex="-1" aria-labelledby="contentAccesslLabel" aria-hidden="false">
        <!-- Begin: modal-dialog -->
        <div class="modal-dialog">
            <!-- Begin: modal-content -->
            <div class="modal-content">
                <!-- Begin: modal-header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="font-size: 2.5rem">&times;</span>
                    </button>
                </div>
                <!-- End: modal-header -->
                <!-- Begin: modal-body -->
                <div class="modal-body">
                    <!-- Begin: s-login-user-form -->
                    <form action="/admin/users/manage" id="s-manage-access-form" method="POST" style="width: 100%; padding: 15px 15px 0 15px">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <h4>Permissões para {{ $user->first_name }} {{ $user->last_name }}</h4>

                        <!-- Begin: form-group -->
                        <div class="form-group" style="display: flex; align-items: flex-start; justify-content: flex-start; width: 100%;">
                            <!-- Begin: radio-option -->
                            <div class="radio-option" style="width: 40%;">
                                <input type="radio" id="team-member" name="permission[]" class="radio-item" @if(!$user->is_admin) checked @endif value="0">
                                <label for="team-member">Colaborador</label>
                            </div>
                            <!-- Begin: radio-option -->
                            <!-- Begin: radio-option -->
                            <div class="radio-option" style="width: 40%;">
                                <input type="radio" id="admin" name="permission[]" class="radio-item" @if($user->is_admin) checked @endif value="1">
                                <label for="admin">Admin</label>
                            </div>
                            <!-- Begin: radio-option -->
                        </div>
                        <!-- End: form-group -->
                    </form>
                    <!-- End: s-login-user-form -->
                </div>
                <!-- End: modal-body -->
                <!-- Begin: modal-footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="s-manage-access-form">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
                <!-- End: modal-footer -->
            </div>
            <!-- End: modal-content -->
        </div>
        <!-- End: modal-dialog -->
    </div>
    <!-- END: CONTENT ACCESS MODAL -->
@endsection


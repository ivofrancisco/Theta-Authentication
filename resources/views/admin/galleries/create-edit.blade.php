@extends('admin.layout.admin_layout')

@section('content')
<!-- BEGIN: MAIN CONTENT
==================================================== -->
<div class="g-main-content">

    @include('admin.partials.breadcrumbs')

    <!-- Begin: g-form-wrapper -->
    <div class="g-form-wrapper shadow-sm">
        <h4>{{ $title }}</h4>
        <!-- Begin: create-article-form -->
        <form action="/admin/galleries/{{ $task }}" class="g-create-edit-form g-cnt-form" method="POST"
            enctype="multipart/form-data">
            @csrf

            @if( $task == 'update' )
            @method('PUT')
            <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
            @endif

            <div class="form-group col-sm-12 col-md-12 @if( $task == 'create' ) s-uploads-wrapper @else s-photos-wrapper @endif"
                style="padding-left: 0;">

                @if( $task == 'create' )
                <label for="add-image1" style="display: none"></label>
                <!-- Begin: g-uploader -->
                <div class="g-uploader
                    loaded gallery" style="margin-bottom: 8px;">
                    <img src="{{ asset('/storage/images/placeholder.png') }}" class="clickable" alt="upload image">
                    <input type="file" name="photos[]" class="photo empty" style="display: none">
                </div>
                <small class="form-text text-danger mb-1">{!!$errors->first('photos') !!}</small>
                <!-- End: g-uploader -->
                @else
                @foreach( $gallery->photos as $photo)
                <!-- Begin: g-uploader -->
                <div class="g-uploader
                        loaded gallery shadow" style="margin-bottom: 8px;">
                    <!-- Begin: g-manage-photo -->
                    <div class="g-manage-photo removable shadow-sm" style="background-color: #96bad0;">
                        <i class="icon-trash"></i>
                    </div>
                    <!-- End: g-manage-photo -->
                    <img src="/storage/images/gallery/{{ $photo }}" class="clickable shadow-sm" alt="upload image">
                    <input type="hidden" name="current_photos[]" value="{{ $photo }}">
                </div>
                <!-- End: g-uploader -->
                @endforeach
                @endif
            </div>
            <!-- End: form-group -->

            <!-- Begin: form-group -->
            <div class="form-group">
                <label for="title">Titúlo</label>
                <input type="text" name="title" class="form-control brd md" id="title"
                    value="@if( $task == 'update')  {{ $gallery->title ?? old('title') }} @endif">
                <small class="form-text text-danger">{!!$errors->first('title') !!}</small>
            </div>
            <!-- End: form-group -->

            @if( $task == 'create')
            <!-- Begin: form-row -->
            <div class="form-row">
                <!-- Begin: form-group -->
                <div class="form-group col-sm-12 col-md-6">
                    <label for="page">Página</label>
                    <select name="page" class="form-control brd md custom-select" id="page">
                        <option value="">Selecionar Página</option>
                        @foreach ($pages as $page)
                        <option value="{{ $page->name }}">{{ $page->name }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-danger">{!!$errors->first('page') !!}</small>
                </div>
                <!-- End: form-group -->

                <!-- Begin: Form Group -->
                <div class="form-group col-sm-12 col-md-6">
                    <label for="page">Referência</label>
                    <select name="reference" class="form-control brd md custom-select" id="reference">
                        @foreach ($pages as $page)
                        <optgroup label="{{ $page->name }}">
                            @foreach ($page->getReferences as $reference)
                            <option value="{{ $reference->name }}">{{ $reference->name }}</option>
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                    <small class="form-text text-danger">{!!$errors->first('reference') !!}</small>
                </div>
                <!-- End: Form Group -->

            </div>
            <!-- End: form-row -->
            @endif

            <!-- Begin: form-group -->
            <div class="form-group">
                <label for="body">Description</label>
                <!-- Begin: g-rich-text-controller -->
                <div class="g-rich-text-controller">
                    <!-- Begin: g-controller-option -->
                    <div class="g-controller-option" onclick="editor.performCommand('bold')">
                        <i class="icon-bold"></i>
                    </div>
                    <!-- End: g-controller-option -->
                    <!-- Begin: g-controller-option -->
                    <div class="g-controller-option" onclick="editor.performCommand('italic')">
                        <i class="icon-italic"></i>
                    </div>
                    <!-- End: g-controller-option -->
                    <!-- Begin: g-controller-option -->
                    <div class="g-controller-option"
                        onclick="editor.performCommandWithArg('createLink', prompt('Enter a URL'), 'https://')">
                        <i class="icon-link" aria-hidden="true"></i>
                    </div>
                    <!-- End: g-controller-option -->
                    <!-- Begin: g-controller-option -->
                    <div class="g-controller-option" onclick="editor.performCommand('unlink')">
                        <i class="icon-broken-link" aria-hidden="true"></i>
                    </div>
                    <!-- End: g-controller-option -->
                    <!-- Begin: g-controller-option -->
                    <div class="g-controller-option" onclick="editor.performCommand('insertUnorderedList')">
                        <i class="icon-ordered-link" aria-hidden="true"></i>
                    </div>
                    <!-- End: g-controller-option -->
                    <!-- Begin: g-controller-option -->
                    <div class="g-controller-option" onclick="editor.performCommand('insertOrderedList')">
                        <i class="icon-list-view_04" aria-hidden="true"></i>
                    </div>
                    <!-- End: g-controller-option -->
                    <!-- Begin: g-controller-option -->
                    <div class="g-controller-option" onclick="editor.performCommand('underline')">
                        <i class="icon-underline" aria-hidden="true"></i>
                    </div>
                    <!-- End: g-controller-option -->
                </div>
                <!-- End: g-rich-text-controller -->
                <!-- Begin: banner_body -->
                <textarea name="body" id="body">
                    @if( $task == 'update') {{ $gallery->body ?? old('body') }} @endif
                </textarea>
                <!-- End: article_body -->
                <!-- Begin: form-control textarea -->
                <iframe class="form-control textarea brd mb-2" name="richTextEditor" id="richTextEditor"></iframe>
                <!-- End: form-control -->
                <small class="form-text text-danger">{!!$errors->first('body') !!}</small>
            </div>
            <!-- End: form-group -->

            @if( $task == 'update')
            <!-- Begin: form-group -->
            <div class="form-group col-sm-12 col-md-12 mt-4" style="padding-left: 0;">
                <label for="add-image2">Adicionar Imagens</label>
                <!-- Begin: s-uploads-wrapper -->
                <div @if( $task=='update' ) class="s-uploads-wrapper" @endif>
                    <!-- Begin: g-uploader -->
                    <div class="g-uploader
                        loaded gallery" style="margin-bottom: 8px">
                        <img src="{{ asset('/images/add_image.svg') }}" class="clickable" alt="upload image">
                        <input type="file" name="photos[]" class="photo empty" style="display: none">
                    </div>
                    <small class="form-text text-danger mb-1">{!!$errors->first('media') !!}</small>
                    <!-- End: g-uploader -->
                </div>
                <!-- End: s-uploads-wrapper -->
            </div>
            <!-- End: form-group -->
            @endif

            <input type="submit" class="btn btn-primary bbm form-submit" value="Guardar">
        </form>
        <!-- End: create-article-form -->
    </div>
    <!-- End: g-form-wrapper -->
</div>
<!-- END: MAIN CONTENT -->
@endsection
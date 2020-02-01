@extends('admin.layouts.app')

@section('title')
    @if(isset($category))
        @lang('site.edit_category') : {{ $category->name }}
    @else
        @lang('site.add_category')
    @endif
@endsection
@push('css')
@endpush
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-files-o"></i> @lang('site.categories')</h1>
            {{--            <p>A free and open source Bootstrap 4 admin template</p>--}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
            {{--            <li class="breadcrumb-item"><i class="fa fa-files-o fa-lg"></i></li>--}}
            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">@lang('site.all_categories')</a></li>
            <li class="breadcrumb-item active"><i class="fa fa-files-o fa-lg"></i> @lang('site.add_category')</li>
        </ul>
    </div>
    <div class="tile mb-4">
        <div class="page-header">
            @if (isset($category))
                <h6><i class="fa fa-files-o"></i> @lang('site.update_category'): {{ $category->name }}</h6>
            @else
                <h6><i class="fa fa-files-o"></i> @lang('site.create_category')</h6>
            @endif
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @include('messages')
                <form class="form-horizontal"
                      action="{{ isset($category)? route('admin.categories.update',$category->id) : route('admin.categories.store') }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($category))
                        @method('PUT')
                    @endif
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 control-label">@lang('site.category_name')</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ isset($category) ? $category->name : old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-sm-3 control-label">@lang('site.category_slug')</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="slug" name="slug"
                                       value="{{ isset($category) ? $category->name : old('slug') }}">
                            </div>
                        </div>
                    <div class="tile-footer">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-light" style="margin-right: 10px;"><i class="fa fa-mail-reply-all"></i> @lang('site.back')</a>
                        <button type="submit" class="btn btn-primary" style="float: right;">{{ isset($category) ? __('site.update_category') : __('site.create_category') }}</button>
                    </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#name').on('blur', function () {
                var theTitle = this.value.toLowerCase().trim(),
                    slugInput = $('#slug,.slug'),
                    theSlug = theTitle.replace(/&/g, 'and')
                        .replace(/[^a-z0-9-u0621-\u064A\u0660-\u0669]+/g, '-')
                        .replace(/\-\-+9/g, '-')
                        .replace(/،/g, '')
                        .replace(/^-+|-+$/g, '');
                slugInput.val(theSlug);
            });
        });
    </script>
@endpush


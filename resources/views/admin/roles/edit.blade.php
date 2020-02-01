@extends('admin.layouts.app')

@section('title')
    @if(isset($role))
        @lang('site.edit_role') : {{ $role->name }}
    @else
        @lang('site.add_role')
    @endif
@endsection
@push('css')
@endpush
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-files-o"></i> @lang('site.roles')</h1>
            {{--            <p>A free and open source Bootstrap 4 admin template</p>--}}
        </div>
        <ul class="app-breadcrumb breadcrumb">
            {{--            <li class="breadcrumb-item"><i class="fa fa-files-o fa-lg"></i></li>--}}
            <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">@lang('site.all_roles')</a></li>
            <li class="breadcrumb-item active"><i class="fa fa-files-o fa-lg"></i> @lang('site.add_role')</li>
        </ul>
    </div>
    <div class="tile mb-4">
        <div class="page-header">
            @if (isset($role))
                <h6><i class="fa fa-files-o"></i> @lang('site.update_role'): {{ $role->name }}</h6>
            @else
                <h6><i class="fa fa-files-o"></i> @lang('site.create_role')</h6>
            @endif
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                @include('messages')
                <form class="form-horizontal"
                      action="{{ isset($role)? route('admin.roles.update',$role->id) : route('admin.roles.store') }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($role))
                        @method('PUT')
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 control-label">@lang('site.role_name')</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ isset($role) ? $role->name : old('name') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                            <h4>@lang('site.permissions')</h4>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Models</th>
                                    <th style="width: 50%;">Permissions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $models = ['categories','users'];
                                @endphp
                                @foreach ($models as $index=>$model)
                                    <tr>
                                        <th scope="row">{{ $index+1 }}</th>
                                        <td class="">{{ $model }}</td>
                                        @php
                                            $maps = ['create','read','update','delete'];
                                        @endphp
                                        <td>
                                            <select name="permissions[]" class="form-control select2" multiple>
                                                @foreach ($maps as $map)
                                                    <option value="">{{ $map }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                    <div class="tile-footer">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-light" style="margin-right: 10px;"><i class="fa fa-mail-reply-all"></i> @lang('site.back')</a>
                        <button type="submit" class="btn btn-primary" style="float: right;">{{ isset($role) ? __('site.update_role') : __('site.create_role') }}</button>
                    </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('admin/js/plugins/select2.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endpush


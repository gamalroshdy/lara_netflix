@extends('admin.layouts.app')

@section('title',__('site.all_categories'))
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
{{--            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">@lang('site.all_categories')</a></li>--}}
            <li class="breadcrumb-item active"><i class="fa fa-files-o fa-lg"></i> @lang('site.all_categories')</li>
        </ul>
    </div>
    <div class="tile mb-4">
        <div class="page-header">
            <div class="row">
                <div class="col-md-3">
                    <div class="sender">
                        <form action="">
                            <input class="app-search__input" type="search" name="search" placeholder="Search" value="{{ request()->search }}" style="width: 100%;">
                            <button type="submit" class="app-search__button"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm"><i class='fa fa-plus'></i> @lang('site.add_category')</a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="tile-body">
                    @include('messages')
                    @if($categories->count() > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.category_name')</th>
                                    <th>@lang('site.category_slug')</th>
                                    <th>@lang('site.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            <form action="{{ route('admin.categories.destroy',$category->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $categories->appends(request()->query())->links() }}
                    @else
                        <p class="text-center">@lang('site.sorry_there_is_no_data_for_this_item')</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush


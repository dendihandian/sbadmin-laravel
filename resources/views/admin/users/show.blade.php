@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Users Management') }}</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" href="{{ route('admin.users.index') }}">{{ __('Back to List') }}</a>
    </div>

    @include('admin._components.flash')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('User Detail') }}</h6>
        </div>
        <div class="card-body">
            @include('admin.users._partials.form', ['_readonly' => true])
            @include('admin.users._partials.form-permissions', ['_readonly' => true])
            <div class="row">
                <div class="form-group col-lg-12 d-flex justify-content-end">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary text-white ml-1">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
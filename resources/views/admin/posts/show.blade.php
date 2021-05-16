@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Posts Management') }}</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" href="{{ route('admin.posts.index') }}">{{ __('Back to List') }}</a>
    </div>

    @include('admin._components.flash')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Post Detail') }}</h6>
        </div>
        <div class="card-body">
            
        </div>
    </div>

</div>
@endsection
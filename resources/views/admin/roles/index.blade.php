@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Roles Management') }}</h1>
        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="{{ route('admin.roles.create') }}"><i class="fas fa-plus fa-sm text-white-50 mr-2"></i> <span>{{ __('Create Role') }}</span></a>
    </div>

    @include('admin._components.flash')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Role List') }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="role-list-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Display name') }}</th>
                            <th>{{ __('Created at') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Display name') }}</th>
                            <th>{{ __('Created at') }}</th>
                            <th>{{ __('Action') }}</th>
                        </tr>
                    </tfoot>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#role-list-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.roles.datatable') }}',
                columns: [
                    { data: 'name', name: 'name'},
                    { data: 'display_name', name: 'display_name'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                columnDefs: [
                    { className: 'text-center', targets: [-1, -2] }
                ]
            });
        });
    </script>
@endsection
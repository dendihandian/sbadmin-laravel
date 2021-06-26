@php
    $_readonly = $_readonly ?? false;
@endphp

<div class="row">
    @include('admin._components.forms.text', [
        '_name' => 'name',
        '_value' => $user->name ?? '',
        '_title' => __('User Name'),
        '_desc' => __('An name for the user'),
        '_readonly' => $_readonly,
    ])

    @include('admin._components.forms.text', [
        '_name' => 'email',
        '_value' => $user->email ?? '',
        '_type' => 'email',
        '_title' => __('User Email'),
        '_desc' => __('An unique email for the user'),
        '_readonly' => $_readonly,
    ])
</div>

@if (!isset($_readonly))
    <div class="row">
        @include('admin._components.forms.text', [
            '_title' => __('User Password'),
            '_name' => 'password',
            '_type' => 'password',
            '_desc' => __('The password for the user'),
        ])

        @include('admin._components.forms.text', [
            '_title' => __('User Password Confirmation'),
            '_name' => 'password_confirmation',
            '_type' => 'password',
            '_desc' => __('Re-type the password'),
        ])
    </div>
@endif

<div class="row">
    @include('admin._components.forms.select', [
        '_name' => 'role',
        '_options' => $role_options ?? [],
        '_value' => $user->roles[0]->name ?? null,
        '_title' => __('User Role'),
        '_desc' => __('Role of the user'),
        '_readonly' => $_readonly,
    ])
</div>

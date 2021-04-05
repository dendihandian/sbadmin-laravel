<div class="row">
    @include('admin._components.forms.text', [
        '_title' => __('Role Name'),
        '_name' => 'name',
        '_value' => $role->name ?? '',
        '_desc' => __('An unique name for the role'),
    ])

    @include('admin._components.forms.text', [
        '_title' => __('Role Display Name'),
        '_name' => 'display_name',
        '_value' => $role->display_name ?? '',
        '_desc' => __('A display name for the role'),
    ])
</div>

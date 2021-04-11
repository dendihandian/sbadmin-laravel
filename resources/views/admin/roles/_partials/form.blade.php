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

<div class="row">
    @include('admin._components.forms.textarea', [
        '_title' => __('Role Description'),
        '_name' => 'description',
        '_value' => $role->description ?? '',
        '_desc' => __('A description for the role'),
        '_col' => 12,
    ])
</div>

@include('admin._components.table-actions.action-show', [
    '_url' => route('admin.roles.show', ['roleId' => $role->id ?? 0 ])
])

@include('admin._components.table-actions.action-edit', [
    '_url' => route('admin.roles.edit', ['roleId' => $role->id ?? 0 ])
])

@include('admin._components.table-actions.action-delete', [
    '_id' => "delete-role-" . $role->id ?? '0',
    '_text' => "Do you want to delete " . $role->name . "?",
    '_url' => route('admin.roles.delete', ['roleId' => $role->id ?? 0])
])
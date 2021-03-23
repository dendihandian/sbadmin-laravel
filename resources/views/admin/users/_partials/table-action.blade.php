@include('admin._components.table-actions.action-show', [
    '_url' => route('admin.users.show', ['userId' => $user->id ?? 0 ])
])

@include('admin._components.table-actions.action-edit', [
    '_url' => route('admin.users.edit', ['userId' => $user->id ?? 0 ])
])

@include('admin._components.table-actions.action-delete', [
    '_id' => "delete-user-" . $user->id ?? '0',
    '_text' => "Do you want to delete " . $user->name . "?",
    '_url' => route('admin.users.delete', ['userId' => $user->id ?? 0])
])
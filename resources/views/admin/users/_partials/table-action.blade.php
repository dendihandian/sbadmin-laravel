@include('admin._components.table-actions.action-show', [
    '_url' => route('admin.users.show', ['userId' => $user->id ?? 0 ])
])

@include('admin._components.table-actions.action-edit', [
    '_url' => route('admin.users.edit', ['userId' => $user->id ?? 0 ])
])

<a class="mx-1 text-danger" title="{{ __('Delete') }}" href="#" onclick="deleteConfirm('delete-user-{{ $user->id }}', 'Do you want to delete {{ $user->name ?? '' }} ?')"><i class="fas fa-trash"></i></a>
<form method="POST" id="delete-user-{{ $user->id ?? 0 }}" action="{{ route('admin.users.delete', ['userId' => $user->id ?? 0]) }}">
    @csrf
    @method('DELETE')
</form>

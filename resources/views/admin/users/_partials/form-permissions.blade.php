@php
    $_user = $user ?? null;
    $_permissions = $permissions ?? collect([]);
    $_user_permission_ids = optional(optional(optional($_user)->permissions)->pluck('id'))->toArray() ?? [];
@endphp

    <div class="form-group">
        <label>{{ __('Permissions') }}</label>

        <div class="row">
            @foreach ($_permissions->chunk(20) as $_permissions_chunk)
            @foreach ($_permissions_chunk as $_permission)
            <div class="col-lg-4">
                <div class="d-flex justify-content-start align-items-center">
                    <input name="permissions[{{ $_permission->name}}]" type="checkbox" @if (in_array($_permission->id, $_user_permission_ids)) checked @endif @if ($_readonly ?? false) disabled @endif /><span class="ml-2">{{ $_permission->display_name ?? $_permission->name }}</span>
                </div>
                @endforeach
            </div>
        </div>
            @endforeach

    </div>

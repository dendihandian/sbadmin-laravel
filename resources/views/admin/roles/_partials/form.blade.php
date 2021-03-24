<div class="row">
    <div class="form-group col-lg-6">
        <label for="name">{{ __('Role Name') }}</label>
        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{  old('name') ?? $role->name ?? '' }}" aria-describedby="name_help" @if ($readonly ?? false) readonly @endif autocomplete="off"/>
        @error('name')
            <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
        @else
            <small id="name_help" class="form-text text-muted">{{ __('An unique name for the role') }}</small>
        @enderror
    </div>
    <div class="form-group col-lg-6">
        <label for="display_name">{{ __('Role Display Name') }}</label>
        <input class="form-control @error('display_name') is-invalid @enderror" id="display_name" type="text" name="display_name" value="{{ old('display_name') ?? $role->display_name ?? '' }}" aria-describedby="display_name_help" @if ($readonly ?? false) readonly @endif autocomplete="off"/>
        @error('display_name')
            <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
        @else
            <small id="display_name_help" class="form-text text-muted">{{ __('A display name for the role') }}</small>
        @enderror
    </div>
</div>

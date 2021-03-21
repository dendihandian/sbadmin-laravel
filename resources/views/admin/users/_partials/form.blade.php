<div class="row">
    <div class="form-group col-lg-6">
        <label for="name">{{ __('User Name') }}</label>
        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{  old('name') ?? $user->name ?? '' }}" aria-describedby="name_help" @if ($readonly ?? false) readonly @endif autocomplete="off"/>
        @error('name')
            <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
        @else
            <small id="name_help" class="form-text text-muted">{{ __('A name for the user') }}</small>
        @enderror
    </div>
    <div class="form-group col-lg-6">
        <label for="email">{{ __('User Email') }}</label>
        <input class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="email" value="{{ old('email') ?? $user->email ?? '' }}" aria-describedby="email_help" @if ($readonly ?? false) readonly @endif autocomplete="off"/>
        @error('email')
            <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
        @else
            <small id="email_help" class="form-text text-muted">{{ __('An unique email for the user') }}</small>
        @enderror
    </div>
    {{-- <div class="form-group col-lg-4">
        <label for="user-role">{{ __('User Role') }}</label>
        <select name="user_role" id="user-role" class="custom-select @error('user_role') is-invalid @enderror" @if ($readonly ?? false) disabled @endif>
            @php $userRole = isset($user) ? optional($user->roles)->first() : null; @endphp
            <option selected disabled>{{ __('Select Role') }}</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" @if (optional($userRole)->id == $role->id || old('user_role') == $role->id) selected @endif>{{ $role->display_name ?? $role->name }}</option>
            @endforeach
        </select>
        @error('user_role')
            <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
        @else
            <small id="user-role-help" class="form-text text-muted">{{ __('Role for the user') }}</small>
        @enderror
    </div> --}}
</div>

@if (!isset($readonly))
<div class="row">
    <div class="form-group col-lg-6">
        <label for="password">{{ __('User Password') }}</label>
        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" aria-describedby="password-help"/>
        @error('password')
        <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
        @else
        <small id="password-help" class="form-text text-muted">{{ __('The password for the user') }}</small>
        @enderror
    </div>
    <div class="form-group col-lg-6">
        <label for="password_confirmation">{{ __('User Password Confirmation') }}</label>
        <input class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" type="password" name="password_confirmation" aria-describedby="password_confirmation_help"/>
        @error('password_confirmation')
        <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
        @else
        <small id="password_confirmation_help" class="form-text text-muted">{{ __('Re-type the password') }}</small>
        @enderror
    </div>
</div>
@endif

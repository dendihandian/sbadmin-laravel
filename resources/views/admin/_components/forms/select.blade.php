<div class="form-group col-lg-{{ $_col ?? 6 }}">
    <label for="select-{{$_name}}">{{ $_title ?? '' }}</label>
    <select name="{{$_name}}" id="select-{{ $_name }}" class="custom-select @error($_name) is-invalid @enderror" @if ($_readonly ?? false) disabled @endif>
        <option selected disabled>{{ $_options_label ?? __('Select the option') }}</option>
        @foreach ($_options as $_option_value => $_option_text)
            <option value="{{ $_option_value }}" @if (($_value ?? null) == $_option_value || old($_name) == $_option_value) selected @endif>{{ $_option_text }}</option>
        @endforeach
    </select>
    @error($_name)
        <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
    @else
        @if ($_desc ?? false)
            <small id="select-{{$_name}}-help" class="form-text text-muted">{{ $_desc }}</small>
        @endif
    @enderror
</div>
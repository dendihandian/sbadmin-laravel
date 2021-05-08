<div class="form-group col-lg-{{ $_col ?? 6 }}">
    <label for="{{$_name}}">{{ $_title ?? '' }}</label>
    <input class="form-control" type="date" name="{{ $_name }}" id="{{ $_name }}" value="{{ $_value ?? '' }}" @if ($_readonly ?? false) readonly @endif>
    @error($_name)
        <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
    @else
        @if ($_desc ?? false)
            <small id="{{$_name}}-help" class="form-text text-muted">{{ $_desc }}</small>
        @endif
    @enderror
</div>
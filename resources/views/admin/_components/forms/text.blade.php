<div class="form-group col-lg-6">
    <label for="{{ $_name }}">{{ $_title ?? '' }}</label>
    <input class="form-control @error($_name) is-invalid @enderror" id="{{ $_name }}" type="text" name="{{ $_name }}" value="{{  old($_name) ?? $_value ?? ''}}" aria-describedby="{{$_name}}_help" @if ($readonly ?? false) readonly @endif autocomplete="off"/>
    @error($_name)
        <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
    @else
        @if ($_name ?? false)
            <small id="{{$_name}}_help" class="form-text text-muted">{{ $_desc ?? '' }}</small>
        @endif
    @enderror
</div>
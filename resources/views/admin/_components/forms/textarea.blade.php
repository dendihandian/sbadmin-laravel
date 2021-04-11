<div class="form-group col-lg-{{ $_col ?? 6 }}">
    <label for="{{ $_name }}">{{ $_title ?? '' }}</label>

    <textarea class="form-control" name="{{ $_name }}" id="{{ $_name }}" cols="{{ $_cols ?? 30}}" rows="{{ $_rows ?? 3 }}" style="resize: {{ $_resize ?? 'none' }};">{{ $_value ?? ''}}</textarea>

    @error($_name)
        <span class="invalid-feedback" user="alert"><strong>{{ $message }}</strong></span>
    @else
        @if ($_name ?? false)
            <small id="{{$_name}}_help" class="form-text text-muted">{{ $_desc ?? '' }}</small>
        @endif
    @enderror
</div>
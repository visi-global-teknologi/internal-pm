@if (true == $checked)
    <input data-key="{{ $key }}" data-url="{{ $url }}" class="form-check-input" type="checkbox" checked>
@else
    <input data-key="{{ $key }}" data-url="{{ $url }}" class="form-check-input" type="checkbox">
@endif

@props(['label', 'for'])

<div class="form-group">
    <label for="{{ $for }}">{{ $label }}</label>
    {{ $slot }}
</div>


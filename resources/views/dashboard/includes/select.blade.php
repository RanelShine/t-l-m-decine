@php
    $label ??= ucfirst($name);
    $name ??= '';
    $value ??= '';
    $class ??= null;
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    <select class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}">
        <option value="">Sélectionner une option</option>
        @foreach ($options as $optionValue => $optionLabel)
            <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

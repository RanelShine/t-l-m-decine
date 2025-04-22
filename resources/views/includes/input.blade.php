@php
    $label   ??= ucfirst($name);
    $name    ??= '';
    $type    ??= 'text';
    $class   ??= null;
    $value   ??= '';
    $options ??= [];
@endphp

<div @class(["form-group", $class])>
    <label for="{{ $name }}"> {{ $label }} </label>

    @if ($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" id="{{ $name }}">{{ old($name, $value) }}</textarea>
        
    @elseif ($type === 'radio')
        <div>
            @foreach ($options as $optionValue => $optionLabel)
                <div class="form-check form-check-inline">
                    <input 
                        class="form-check-input @error($name) is-invalid @enderror" 
                        type="radio" 
                        name="{{ $name }}" 
                        id="{{ $name . '_' . $optionValue }}" 
                        value="{{ $optionValue }}" 
                        {{ (old($name, $value) == $optionValue) ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $name . '_' . $optionValue }}">
                        {{ $optionLabel }}
                    </label>
                </div>
            @endforeach
        </div>
        
    @else
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}">
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

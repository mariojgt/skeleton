<div class="p-4">
    <p class="mb-4 italic">
        {{ $label ?? 'undefine' }}
    </p>
    <textarea class="w-full h-24 p-2 text-base-content bg-base-100 rounded" name="{{ $name ?? 'name' }}" id="{{ $id ?? $name }}"
        {{ $required ?? '' == "true" ? "required" : "" }}>{{ $value }}</textarea>
</div>

@error($name)
<span class="invalid-feedback text-base-content" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

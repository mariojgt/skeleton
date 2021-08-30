<div class="form-control p-3">
    <label class="label">
        <span class="label-text">
            {{ $label ?? 'undefine' }}
        </span>
    </label>
    <input type="text" name="{{ $name ?? 'name' }}" id="{{ $id ?? $name }}"
    {{ $required ?? '' == "true" ? "required" : "" }} value="{{ $value ?? old($name) }}"
    placeholder="{{ $placeholder ?? '' }}" class="input text-base-content input-info input-bordered w-full" />
</div>

@error($name)
<span class="invalid-feedback text-black dark:text-white" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

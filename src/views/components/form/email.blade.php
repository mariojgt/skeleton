<div class="form-control p-3">
    <label class="label">
        <span class="label-text">
            {{ $label ?? 'undefine' }}
        </span>
    </label>
    <input type="email" name="{{ $name ?? 'name' }}" id="{{ $id ?? $name }}"
    {{ $required ?? '' == "true" ? "required" : "" }} value="{{ $value ?? old($name) }}"
    placeholder="{{ $placeholder ?? '' }}" class="input w-full input-info input-bordered" />
</div>

@error($name)
<span class="invalid-feedback text-base-content dark:text-white" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

<div class="p-6 card bordered">
    <div class="form-control">
        <label class="cursor-pointer label">
            <span class="label-text">
                {{ $label ?? 'undefine' }}
            </span>
            <div>
                <input type="checkbox" class="toggle"
                    name="{{ $name ?? 'name' }}" id="{{ $id ?? $name }}"
                    {{ $checked ?? 'false' == "true" ? 'checked="checked"' : "" }}
                    {{ $required ?? '' == "true" ? "required" : "" }} value="{{ $value ?? old($name) }}"
                >

                <span class="toggle-mark"></span>
            </div>
        </label>
    </div>
</div>

@error($name)
    <span class="invalid-feedback text-black dark:text-white" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

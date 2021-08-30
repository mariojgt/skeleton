<label class="font-semibold text-sm text-base-content pb-1 block">
    {{ $label ?? 'undefine' }}
</label>

<input type="date" name="{{ $name ?? 'name' }}" id="{{ $id ?? $name }}"
    {{ $required ?? '' == "true" ? "required" : "" }} value="{{ $value ?? old($name) }}"
    placeholder="{{ $placeholder ?? '' }}" step="{{ $step ?? '0' }}" @if (!empty($max)) max="{{ $max }}" @endif
    class="border rounded-lg focus:border-black dark:focus:border-white dark:bg-gray-900 text-base-content px-3 py-3 mt-1 mb-5 text-sm w-full" />

@error($name)
    <span class="invalid-feedback text-base-content" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

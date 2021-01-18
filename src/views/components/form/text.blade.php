
<label class="font-semibold text-sm text-gray-600 pb-1 block">{{ $label ?? 'undefine' }}</label>
<input type="text" name="{{ $name ?? 'name' }}" id="{{ $id ?? $name }}"
    {{ $required ?? '' == "true" ? "required" : "" }}
    value="{{ $value ?? old($name) }}"
    placeholder="{{ $placeholder ?? '' }}"
class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" />
@error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

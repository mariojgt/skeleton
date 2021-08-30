
<div class="form-control p-3">
    <label class="label">
        <span class="label-text">
            {{ $label ?? 'undefine' }}
        </span>
    </label>
    <textarea class="tiny" name="{{ $name ?? 'name' }}" id="{{ $id ?? $name }}"
        {{ $required ?? '' == "true" ? "required" : "" }}>{{ $value }}
    </textarea>
</div>

@push('js')
    <script src="{{ asset('vendor/UnityAdmin/js/tinyMce.js') }}"></script>
@endpush

@error($name)
    <span class="invalid-feedback text-black dark:text-white" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

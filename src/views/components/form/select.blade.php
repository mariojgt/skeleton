<select-tailwind label="{{ $label }}" required="{{ $required ?? 'false' }}" value="{{ $value ?? '' }}"
    values="{{ $values }}" name="{{ $name }}">
    <template #error>
        @error($name)
        <span class="invalid-feedback text-black dark:text-white" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </template>
</select-tailwind>
<br>

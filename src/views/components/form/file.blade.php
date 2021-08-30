<div class="form-control p-3">

    <label class="label">
        <span class="label-text">
            {{ $label ?? 'undefine' }}
        </span>
    </label>

    <label
        class="wp-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-blue-500">
        <i class="fas fa-camera-retro fa-fw mr-3 text-blue-400"></i>
        <input type='file' onchange="loadFile(event)" name="{{ $name }}"
            {{ $required ?? 'false' == 'true' ? "required" : '' }} class="hidden"
            {{ $isMultiple ?? 'false' == "true" ? "multiple" : "" }} />

        <div class="avatar">
            <div class="mb-8 rounded-full w-24 h-24 ring ring-primary ring-offset-base-100 ring-offset-2">
                <img id="output"  src="{{ $value ?? 'http://daisyui.com/tailwind-css-component-profile-1@94w.png' }}">
            </div>
        </div>
    </label>

    @if ($required ?? 'false' == 'true')
        <p class="text-theme-6 mt-2">{{ __('inputs.required') }}</p>
        @error($name)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    @endif
</div>

@push('js')
<script>
    var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src)  // free memory
            }
        };
</script>
@endpush

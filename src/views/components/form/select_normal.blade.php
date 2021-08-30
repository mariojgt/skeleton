
<div class="form-control p-3">
    <label class="label">
        <span class="label-text">
            {{ $label ?? 'undefine' }}
        </span>
    </label>

    <select class="select select-bordered w-full input-info" name="{{ $name }}" value="{{ $fieldValue ?? '' }}" >
        @foreach ($options as $key => $value)
            <option value="{{ $value }}" >{{ $key }}</option>
        @endforeach
    </select>
</div>

@error($name)
<span class="invalid-feedback text-black dark:text-white" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

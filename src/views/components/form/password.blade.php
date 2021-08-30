<div class="mb-3 space-y-2 w-full text-xs">
    <label class="font-semibold text-sm text-gray-600 dark:text-white pb-1 block">
        {{ $label ?? 'undefine' }}
    </label>
    <div class="flex flex-wrap items-stretch w-full mb-4 relative">
        <div class="flex">
            <span
                class="flex leading-normal bg-base-100 border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-sm w-12 h-10 justify-center items-center rounded-lg text-primary"
                onclick="$inputs.passwordToogle('{{ $id ?? $name }}')"
                >

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </span>
        </div>
        <input type="password" name="{{ $name ?? 'name' }}" id="{{ $id ?? $name }}"
            {{ $required ?? '' == "true" ? "required" : "" }} value="{{ $value ?? old($name) }}"
            placeholder="{{ $placeholder ?? '' }}" class="flex-shrink flex-grow leading-normal w-px border border-l-0 h-10 rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow
            text-base-content
            bg-base-100
            focus:border-black dark:focus:border-white dark:bg-gray-900 dark:text-white text-sm
        ">
    </div>
</div>

@error($name)
<span class="invalid-feedback text-black dark:text-white" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

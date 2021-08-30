{{-- Modal Create --}}
<a href="javascript:;" data-toggle="modal" data-target="#{{ $id ?? 'example-modal' }}"
    class="{{ $class ?? 'button inline-block bg-theme-1 text-white' }}">
    {{ $name ?? 'give_me_a_name' }}
</a>

<div class="modal" id="{{ $id ?? 'example-modal' }}">
    <div class="modal__content modal__content--xl p-10">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
            <h2 class="font-medium text-base mr-auto">
                {{ $header ?? '' }}
            </h2>
        </div>
        {{ $slot }}
    </div>
</div>

{{-- End Modal --}}

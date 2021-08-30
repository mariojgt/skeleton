{{-- Logo slot --}}
@if (!empty($image))
{{-- <div
    class="bg-white border border-4 border-black dark:border-white dark:bg-black shadow w-full rounded-lg divide-y divide-white">
    <div
        class="flex flex-col justify-center items-center relative h-full bg-white dark:bg-black bg-opacity-50 dark:text-white text:black">
        <img src="{{ $image }}" class="h-24 w-24 object-cover rounded-full">
<h1 class="text-2xl font-semibold">Unityuser
    <small><a href="https://github.com/mariojgt/unity-user/wiki" target="_blank">Documentation</a></small>
</h1>
<h4 class="font-semibold text-sm text-gray-600 dark:text-white pb-1 block">Mario Jose Goes Tarosso </h4>
<div class="flex mt-4 text-sm font-semibold text-black">
    <svg class="w-4 h-4 mt-1 mr-2 text-green-600" fill="none" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
        <path
            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
        </path>
    </svg>
    <div class="text-black dark:text-white">
        v{{ config('unityuser.version') }}
        <br>
        <span class="text-xs">on June 10, 2021</span>
    </div>
</div>
</div>
</div> --}}
@endif

<div class="min-h-screen bg-indigo-400 flex justify-center items-center">
    <div class="absolute w-60 h-60 rounded-xl bg-indigo-300 -top-5 -left-16 z-0 transform rotate-45 hidden md:block">
    </div>
    <div class="absolute w-48 h-48 rounded-xl bg-indigo-300 -bottom-6 -right-10 transform rotate-12 hidden md:block">
    </div>
    <div class="w-auto py-12 px-12 bg-white rounded-2xl shadow-xl z-20">
        <div>
            <h1 class="text-3xl font-bold text-center mb-4 cursor-pointer">{{ $title ?? 'Title here' }}</h1>
            <p class="w-80 text-center text-sm mb-8 font-semibold text-gray-700 tracking-wide cursor-pointer">
                {{ $subtitle ?? 'Sub Title here' }}</p>
        </div>

        {{ $form }}

        {{ $links }}

    </div>
    <div class="w-40 h-40 absolute bg-indigo-300 rounded-full top-0 right-12 hidden md:block"></div>
    <div class="w-20 h-40 absolute bg-indigo-300 rounded-full bottom-20 left-10 transform rotate-45 hidden md:block">
    </div>
</div>

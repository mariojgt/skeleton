<!-- component -->
{{-- <img class="mb-3 mx-auto" style="height: 150px;" src="https://www.fatcow.com/images/free-logos/World-Wide01.jpg" alt=""> --}}
<h1 class="font-bold text-center text-2xl mb-5 dark:text-white">{{ $title ?? 'Title here' }}</h1>
<div class="bg-white border border-4 border-black dark:border-white dark:bg-black shadow w-full rounded-lg divide-y divide-white">
    {{ $form }}
    <div class="py-5">
        {{ $links }}
    </div>
</div>

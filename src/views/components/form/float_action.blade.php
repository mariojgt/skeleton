<div>
    {{-- The floating icons --}}
    <a href="{{ $actionRoute ?? '#' }}" onclick="saveContent()" class="float">
        <i class="fas {{ $icon ?? 'fa-envelope' }} my-float"></i>
    </a>
    <div class="label-container">
        <div class="label-text">{{ $actionName ?? 'Give me a purpose' }}</div>
        <i class="fa fa-play label-arrow"></i>
    </div>
</div>

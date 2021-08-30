
<p class="mt-4 text-sm"><span class="underline cursor-pointer">
    <a href="{{ $route ?? '' }}" {{ $new ?? '' === "false" ? 'target="_blank"' : "" }}>
        {{ $name ?? 'add a name' }}
    </a>
</span>
</p>

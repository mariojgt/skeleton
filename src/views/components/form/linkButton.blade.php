<div class="p-3">
    <a class="
        btn btn-outline btn-primary btn-block
    " href="{{ $route ?? '' }}" {{ $new ?? '' === "false" ? 'target="_blank"' : "" }}>
        {{ $name ?? 'add a name' }}
    </a>
</div>

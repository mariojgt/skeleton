<form action="{{ $action ?? '/' }}" method="{{ $method ?? 'POST' }}" >
    @csrf
    {{ $slot }}
</form>

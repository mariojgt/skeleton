@php
$method = $method ??'POST';
if ($method == 'PUT' || $method == 'PATCH') {
$method_form= 'POST';
} else {
$method_form= 'POST';
}
@endphp

<form action="{{ $action ?? '/' }}" method="{{ $method_form }}" {{ !empty($id) ? "id=".$id."" : "" }}
    {{ $file ?? '' == "true" ? 'enctype=multipart/form-data' : "" }}>
    {{-- Needed case you need to update --}}
    @if ($method == 'PUT' || $method == 'PATCH')
    @method($method)
    @endif
    @csrf

    {{ $slot }}
</form>

{{-- https://github.com/SortableJS/Sortable --}}

@php
    $parentElementName = 'drag-item-' . $data->first()->id;
@endphp

<div class="py-4 artboard  bg-base-200">
    <ul class="menu p-4 shadow-lg bg-base-100 rounded-box" id="{{ $parentElementName }}">
        @foreach ($data as $item)
            @if ($item->children->first())
                <li data-id="{{ $item->id }}" class="border-neutral border-2 rounded" >
                    <a href="{{ route($route, $item->id) }}" >
                        <i data-feather="{{ $item->icon }}" class="inline-block w-5 h-5 mr-2 stroke-current" ></i>
                        <div class="font-medium">{{ $item->name }}</div>
                    </a>

                    <x-unity::utility.reorder
                        :data="$item->children()->orderBy('sort', 'asc')->get()"
                        color="bg-base-800"
                        :sort="true"
                        :route="$route"
                    />
                </li>
            @else
                <li data-id="{{ $item->id }}" class="border-primary border-2 flex flex-row mb-2" >

                    <a href="{{ route($route, $item->id) }}" >
                        <i data-feather="{{ $item->icon }}" class="inline-block w-5 h-5 mr-2 stroke-current" ></i>
                        <div class="font-medium">{{ $item->name }}</div>
                    </a>

                </li>
            @endif
        @endforeach
    </ul>
</div>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"
    integrity="sha512-5x7t0fTAVo9dpfbp3WtE2N6bfipUwk7siViWncdDoSz2KwOqVC1N9fDxEOzk0vTThOua/mglfF8NO7uVDLRC8Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@push('js')

<script>
    var el = document.getElementById('{{ $parentElementName }}');
        var sortable = Sortable.create(el,{
            group: {
                name: "nested",
                pull: true,
                put : true,
            },
            // sort: '{{ $sort ?? false }}',
            sort: true,
            ghostClass    : "border-dashed",   // Class name for the drop placeholder
            chosenClass   : "border-dashed",   // Class name for the chosen item
            dragClass     : "border-dashed",   // Class name for the dragging item
            animation     : 150,
            fallbackOnBody: true,
            swapThreshold : 0.65,
            // Called when dragging element changes position
            onChange: function(evt) {
                let order = [];

                for (const [key, value] of Object.entries(evt.target.children)) {
                    let currentOrder = parseInt(key) + 1;
                    order.push({
                        order: currentOrder,
                        id: value.getAttribute('data-id'),
                    });
                }

                axios.post('{{ route("navigation.order.update") }}', {
                    menuOrder:order
                })
                .then(function (response) {
                })
                .catch(function (error) {
                });

                Toastify({
                    text           : `Order Updated`,
                    duration       : 3000,
                    newWindow      : true,
                    close          : true,
                    gravity        : "top",                                                  // `top` or `bottom`
                    position       : "center",                                               // `left`, `center` or `right`
                    backgroundColor: "#3160D8",
                    stopOnFocus    : true,
                    escapeMarkup   : false
                }).showToast();
            }
        });

</script>
@endpush

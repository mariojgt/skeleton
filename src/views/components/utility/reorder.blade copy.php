{{-- https://github.com/SortableJS/Sortable --}}



<ul class="flex flex-col bg-gray-300 p-4" id="items">
    <li class="border-black border-2 flex flex-row mb-2">
        <div
            class="select-none cursor-pointer bg-gray-200 rounded-md flex w-full items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">💧</div>
            <div class="flex-1 pl-1 mr-16">
                <div class="font-medium">Cup of water</div>
                <div class="text-gray-600 text-sm">200ml</div>
            </div>
            <div class="text-gray-600 text-xs">6:00 AM</div>
        </div>
    </li>
    <li class="border-black border-2 flex flex-row mb-2">
        <div
            class="select-none cursor-pointer bg-gray-200 rounded-md flex w-full items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">⚽️</div>
            <div class="flex-1 pl-1 mr-16">
                <div class="font-medium">Training</div>
                <div class="text-gray-600 text-sm">1h</div>
            </div>
            <div class="text-gray-600 text-xs">10:00 AM</div>
        </div>
    </li>
    <li class="border-black border-2 flex flex-row mb-2">
        <div
            class="select-none cursor-pointer bg-gray-200 rounded-md flex w-full items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">📖</div>
            <div class="flex-1 pl-1 mr-16">
                <div class="font-medium">Study</div>
                <div class="text-gray-600 text-sm">4h</div>
            </div>
            <div class="text-gray-600 text-xs">1:00 PM</div>
        </div>
    </li>
</ul>


@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"
    integrity="sha512-5x7t0fTAVo9dpfbp3WtE2N6bfipUwk7siViWncdDoSz2KwOqVC1N9fDxEOzk0vTThOua/mglfF8NO7uVDLRC8Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var el = document.getElementById('items');
        var sortable = Sortable.create(el,{
            group: {
                name: "nested",
                pull: true,
                put: true,
            },
            fallbackOnBody: true,
            ghostClass    : "border-dashed",   // Class name for the drop placeholder
            chosenClass   : "border-dashed",   // Class name for the chosen item
            dragClass     : "border-dashed",   // Class name for the dragging item
            animation     : 150,
            fallbackOnBody: true,
            swapThreshold : 0.65,
            // Called when dragging element changes position
            onChange: function(evt) {
                console.log(evt);
            }
        });

</script>
@endpush

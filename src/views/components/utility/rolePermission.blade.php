
<div class="border-dashed border-4 border-purple-600 p-3">
    {{-- Div that will hold all the hidden fields --}}
    <div id="hidden-per">
        @foreach ($selectedPermissions as $item)
            <input type="hidden" name="permissions[]" value="{{ $item }}" id="hidden_{{ $item }}">
        @endforeach
    </div>
    <label class="font-semibold text-sm text-gray-600 dark:text-white pb-1 block">
        Drop the new permssion in the box
    </label>
    <ul class="flex flex-col bg-purple-500 p-4" id="selected-permissions">
        @foreach ($selectedPermissions as $item)
            <li class="border-black border-2 flex flex-row mb-2" data-id="{{ $item }}">
                <div
                    class="select-none cursor-pointer bg-gray-200 rounded-md flex w-full items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                        🔒
                    </div>
                    <div class="flex-1 pl-1 mr-16">
                        <div class="font-medium">{{ $item }}</div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    {{-- Permisison Search --}}
    <div class="relative">
        <label class="font-semibold text-sm text-gray-600 dark:text-white pb-1 block">
            Permission Search
        </label>
        <span class="absolute inset-y-0 left-0 flex items-center pl-3"></span>
        <input type="text" onkeyup="search()" id="search-icon" placeholder="Search"
            class="border rounded-lg focus:border-black dark:focus:border-white dark:bg-gray-900 dark:text-white px-3 py-3 mt-1 mb-5 text-sm w-full">
    </div>
    <ul class="flex flex-col bg-gray-300 p-4" id="items">
        @foreach ($permissions as $item)
        @if (!in_array($item->name, $selectedPermissions))
            <li class="border-black border-2 flex flex-row mb-2" data-id="{{ $item->name }}">
                <div
                    class="select-none cursor-pointer bg-gray-200 rounded-md flex w-full items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                        🔒
                    </div>
                    <div class="flex-1 pl-1 mr-16">
                        <div class="font-medium">{{ $item->name }}</div>
                    </div>
                </div>
            </li>
        @endif
        @endforeach
    </ul>
</div>

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
        swap: true, // Enable swap plugin

        // Called when dragging element changes position
        onAdd: function(evt) {
            let permissionName    = evt.clone.getAttribute('data-id');
            let InputToRemove = document.querySelector('#hidden_'+permissionName);
            if (InputToRemove) {
                InputToRemove.remove();
            }
        },
    });

    var el = document.getElementById('selected-permissions');
    var sortable = Sortable.create(el,{
        group: {
            name: "group1",
            pull: true,
            put: true,
        },
        fallbackOnBody: true,
        swap          : false,              // Enable swap plugin
        ghostClass    : "border-dashed",   // Class name for the drop placeholder
        chosenClass   : "border-dashed",   // Class name for the chosen item
        dragClass     : "border-dashed",   // Class name for the dragging item
        animation     : 150,
        fallbackOnBody: false,
        swapThreshold : 0.65,
        // Called when dragging element changes position
        onAdd: function(evt) {
            // THe dragged item information
            let permissionName    = evt.clone.getAttribute('data-id');
            // Reference to the div hidden inputs
            let hiddenInputDiv = document.querySelector('#hidden-per');
            // The new hidden field
            hiddenInputDiv.innerHTML += `
                <input type="hidden" name="permissions[]" value="`+permissionName+`" id="hidden_`+permissionName+`">
            `;
        },
    });


    // Search login
    function search() {
        let search      = document.querySelector('#search-icon').value;
        let searchPanel = document.querySelector('#items').children;
        for (const [key, value] of Object.entries(searchPanel)) {
            let icon = value.getAttribute('data-id');
            value.style.display = 'block';
            if (!icon.includes(search)) {
                value.style.display = 'none';
            }
        }
    }
</script>
@endpush

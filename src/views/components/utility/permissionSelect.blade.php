{{-- Permission list --}}
@php
    use Spatie\Permission\Models\Permission;
    $data = cache()->remember('permission', '259200', function () {
            return  Permission::pluck('name', 'id');
        });
@endphp

<div class="border-dashed border-4 border-purple-600 p-3" >
{{-- https://github.com/SortableJS/Sortable --}}
<input type="hidden" name="permission" value="user" id="permission_value">
<label class="font-semibold text-sm text-gray-600 dark:text-white pb-1 block">
    Drop the new permission in the green box
</label>

<ul class="flex flex-col bg-purple-500 p-4" id="selected-item-perm">
    <li class="border-black border-2 flex flex-row mb-2" data-id="{{ $selectedPermission ?? 'null' }}">
        <div
            class="select-none cursor-pointer bg-gray-200 rounded-md flex w-full items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                🔒
            </div>
            <div class="flex-1 pl-1 mr-16">
                <div class="font-medium">{{ $selectedPermission ?? 'null' }}</div>
            </div>
        </div>
    </li>
</ul>

<div class="relative">
    <label class="font-semibold text-sm text-gray-600 dark:text-white pb-1 block">
        Permission Search
    </label>
    <span class="absolute inset-y-0 left-0 flex items-center pl-3"></span>
        <input type="text"
        onkeyup="permissionSearch()"
        id="search-perm"
        placeholder="Search"
        class="border rounded-lg focus:border-black dark:focus:border-white dark:bg-gray-900 dark:text-white px-3 py-3 mt-1 mb-5 text-sm w-full">
</div>

<ul class="flex flex-col bg-gray-300 p-4" id="perm-items">
    @foreach ($data as $key => $item)
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
</div>
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"
    integrity="sha512-5x7t0fTAVo9dpfbp3WtE2N6bfipUwk7siViWncdDoSz2KwOqVC1N9fDxEOzk0vTThOua/mglfF8NO7uVDLRC8Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var el = document.getElementById('perm-items');
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
            console.log('here 1');
        },
    });

    var el = document.getElementById('selected-item-perm');
    var sortable = Sortable.create(el,{
        group: {
            name: "group1",
            pull: false,
            put: true,
        },
        fallbackOnBody: true,
        swap          : true,              // Enable swap plugin
        ghostClass    : "border-dashed",   // Class name for the drop placeholder
        chosenClass   : "border-dashed",   // Class name for the chosen item
        dragClass     : "border-dashed",   // Class name for the dragging item
        animation     : 150,
        fallbackOnBody: false,
        swapThreshold : 0.65,
        // Called when dragging element changes position
        onAdd: function(evt) {
            let iconName    = evt.clone.getAttribute('data-id');
            let input       = document.querySelector('#permission_value');
                input.value = iconName;
        },
    });


    // Seach login
    function permissionSearch() {
        let search      = document.querySelector('#search-perm').value;
        let searchPanel = document.querySelector('#perm-items').children;
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

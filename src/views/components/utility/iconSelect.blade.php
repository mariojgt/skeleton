{{-- Icon list --}}
@php
$icons = [
    'activity',
    'airplay',
    'alert-circle',
    'alert-octagon',
    'alert-triangle',
    'align-center',
    'align-justify',
    'align-left',
    'align-right',
    'anchor',
    'aperture',
    'archive',
    'arrow-down-circle',
    'arrow-down-left',
    'arrow-down-right',
    'arrow-down',
    'arrow-left-circle',
    'arrow-left',
    'arrow-right-circle',
    'arrow-right',
    'arrow-up-circle',
    'arrow-up-left',
    'arrow-up-right',
    'arrow-up',
    'at-sign',
    'award',
    'bar-chart-2',
    'bar-chart',
    'battery-charging',
    'battery',
    'bell-off',
    'bell',
    'bluetooth',
    'bold',
    'book-open',
    'book',
    'bookmark',
    'box',
    'briefcase',
    'calendar',
    'camera-off',
    'camera',
    'cast',
    'check-circle',
    'check-square',
    'check',
    'chevron-down',
    'chevron-left',
    'chevron-right',
    'chevron-up',
    'chevrons-down',
    'chevrons-left',
    'chevrons-right',
    'chevrons-up',
    'chrome',
    'circle',
    'clipboard',
    'clock',
    'cloud-drizzle',
    'cloud-lightning',
    'cloud-off',
    'cloud-rain',
    'cloud-snow',
    'cloud',
    'code',
    'codepen',
    'codesandbox',
    'coffee',
    'columns',
    'command',
    'compass',
    'copy',
    'corner-down-left',
    'corner-down-right',
    'corner-left-down',
    'corner-left-up',
    'corner-right-down',
    'corner-right-up',
    'corner-up-left',
    'corner-up-right',
    'cpu',
    'credit-card',
    'crop',
    'crosshair',
    'database',
    'delete',
    'disc',
    'divide-circle',
    'divide-square',
    'divide',
    'dollar-sign',
    'download-cloud',
    'download',
    'dribbble',
    'droplet',
    'edit-2',
    'edit-3',
    'edit',
    'external-link',
    'eye-off',
    'eye',
    'facebook',
    'fast-forward',
    'feather',
    'figma',
    'file-minus',
    'file-plus',
    'file-text',
    'file',
    'film',
    'filter',
    'flag',
    'folder-minus',
    'folder-plus',
    'folder',
    'framer',
    'frown',
    'gift',
    'git-branch',
    'git-commit',
    'git-merge',
    'git-pull-request',
    'github',
    'gitlab',
    'globe',
    'grid',
    'hard-drive',
    'hash',
    'headphones',
    'heart',
    'help-circle',
    'hexagon',
    'home',
    'image',
    'inbox',
    'info',
    'instagram',
    'italic',
    'key',
    'layers',
    'layout',
    'life-buoy',
    'link-2',
    'link',
    'linkedin',
    'list',
    'loader',
    'lock',
    'log-in',
    'log-out',
    'mail',
    'map-pin',
    'map',
    'maximize-2',
    'maximize',
    'meh',
    'menu',
    'message-circle',
    'message-square',
    'mic-off',
    'mic',
    'minimize-2',
    'minimize',
    'minus-circle',
    'minus-square',
    'minus',
    'monitor',
    'moon',
    'more-horizontal',
    'more-vertical',
    'mouse-pointer',
    'move',
    'music',
    'navigation-2',
    'navigation',
    'octagon',
    'package',
    'paperclip',
    'pause-circle',
    'pause',
    'pen-tool',
    'percent',
    'phone-call',
    'phone-forwarded',
    'phone-incoming',
    'phone-missed',
    'phone-off',
    'phone-outgoing',
    'phone',
    'pie-chart',
    'play-circle',
    'play',
    'plus-circle',
    'plus-square',
    'plus',
    'pocket',
    'power',
    'printer',
    'radio',
    'refresh-ccw',
    'refresh-cw',
    'repeat',
    'rewind',
    'rotate-ccw',
    'rotate-cw',
    'rss',
    'save',
    'scissors',
    'search',
    'send',
    'server',
    'settings',
    'share-2',
    'share',
    'shield-off',
    'shield',
    'shopping-bag',
    'shopping-cart',
    'shuffle',
    'sidebar',
    'skip-back',
    'skip-forward',
    'slack',
    'slash',
    'sliders',
    'smartphone',
    'smile',
    'speaker',
    'square',
    'star',
    'stop-circle',
    'sun',
    'sunrise',
    'sunset',
    'tablet',
    'tag',
    'target',
    'terminal',
    'thermometer',
    'thumbs-down',
    'thumbs-up',
    'toggle-left',
    'toggle-right',
    'tool',
    'trash-2',
    'trash',
    'trello',
    'trending-down',
    'trending-up',
    'triangle',
    'truck',
    'tv',
    'twitch',
    'twitter',
    'type',
    'umbrella',
    'underline',
    'unlock',
    'upload-cloud',
    'upload',
    'user-check',
    'user-minus',
    'user-plus',
    'user-x',
    'user',
    'users',
    'video-off',
    'video',
    'voicemail',
    'volume-1',
    'volume-2',
    'volume-x',
    'volume',
    'watch',
    'wifi-off',
    'wifi',
    'wind',
    'x-circle',
    'x-octagon',
    'x-square',
    'x',
    'youtube',
    'zap-off',
    'zap',
    'zoom-in',
    'zoom-out',
];

@endphp

<div class="border-dashed border-4 border-purple-600 p-3" >
{{-- https://github.com/SortableJS/Sortable --}}
<input type="hidden" name="icon" value="user" id="icon_value">
<label class="font-semibold text-sm text-gray-600 dark:text-white pb-1 block">
    Drop the new icon in the green box
</label>
<ul class="flex flex-col bg-purple-500 p-4" id="selected-item">
    <li class="border-black border-2 flex flex-row mb-2" data-id="{{ $selectedIcon }}">
        <div
            class="select-none cursor-pointer bg-gray-200 rounded-md flex w-full items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                <i data-feather="{{ $selectedIcon }}"></i>
            </div>
            <div class="flex-1 pl-1 mr-16">
                <div class="font-medium">{{ $selectedIcon }}</div>
            </div>
        </div>
    </li>
</ul>

<div class="relative">
    <label class="font-semibold text-sm text-gray-600 dark:text-white pb-1 block">
        Icon Search
    </label>
    <span class="absolute inset-y-0 left-0 flex items-center pl-3"></span>
        <input type="text"
        onkeyup="search()"
        id="search-icon"
        placeholder="Search"
        class="border rounded-lg focus:border-black dark:focus:border-white dark:bg-gray-900 dark:text-white px-3 py-3 mt-1 mb-5 text-sm w-full">
</div>

<ul class="flex flex-col bg-gray-300 p-4" id="items">
    @foreach ($icons as $item)
    <li class="border-black border-2 flex flex-row mb-2" data-id="{{ $item }}">
        <div
            class="select-none cursor-pointer bg-gray-200 rounded-md flex w-full items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
            <div class="flex flex-col rounded-md w-10 h-10 bg-gray-300 justify-center items-center mr-4">
                <i data-feather="{{ $item }}"></i>
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
            console.log('here 1');
        },
    });

    var el = document.getElementById('selected-item');
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
            let input       = document.querySelector('#icon_value');
                input.value = iconName;
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

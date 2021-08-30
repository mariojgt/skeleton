<div class="dropdown dropdown-end">

    <button class="btn btn-square btn-ghost">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
          </svg>
    </button>

    <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">

        <li class="text-base-content" onclick="changeTheme('light')">
            <a>light</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('dark')">
            <a>dark</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('cupcake')">
            <a>cupcake</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('bumblebee')">
            <a>bumblebee</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('emerald')">
            <a>emerald</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('corporate')">
            <a>corporate</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('synthwave')">
            <a>synthwave</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('retro')">
            <a>retro</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('cyberpunk')">
            <a>cyberpunk</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('valentine')">
            <a>valentine</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('halloween')">
            <a>halloween</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('garden')">
            <a>garden</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('forest')">
            <a>forest</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('aqua')">
            <a>aqua</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('lofi')">
            <a>lofi</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('pastel')">
            <a>pastel</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('fantasy')">
            <a>fantasy</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('wireframe')">
            <a>wireframe</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('black')">
            <a>black</a>
        </li>
        <li class="text-base-content" onclick="changeTheme('dracula')">
            <a>dracula</a>
        </li>
    </ul>
</div>

@push('js')
<script>
    // Get the saved theme option
        const theme = localStorage.getItem('theme');
        if (theme) {
            changeTheme(theme);
        } else {
            changeTheme('light');
        }

        function changeTheme(theme) {
            // Find the main html theme
            var html = document.getElementsByTagName("HTML")[0];
            // now check if there is data in the stora
            html.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
        }

</script>
@endpush

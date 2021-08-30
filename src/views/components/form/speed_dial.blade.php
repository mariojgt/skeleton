<div>
    <div class="speed-dial">
        <button class="speed-dial__button speed-dial__button--primary">
            <i class="fas fa-bars"></i>
        </button>
        <div class="speed-dial__options">

            @foreach ($action as $item)
            <a href="{{ $item['route'] }}" class="speed-dial__button text-white">
                <div class="material-icons">
                    <div
                        class="cursor-pointer bg-indigo-600 hover:bg-blue-500 text-teal-100 py-2 px-4 rounded inline-flex items-center">
                        {!! $item['icon'] ?? '<i class="fill-current w-4 h-4 mr-2 fas fa-envelope"></i>' !!}
                        <span>{{ $item['name'] }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

</div>

@push('css')
<style>
    .speed-dial {
        position: fixed;
        bottom: 15px;
        right: 15px;
        z-index: 99999999999999999999999999999999999999999999;
    }

    .speed-dial__options {
        position: absolute;
        bottom: 110%;
        width: 100%;
        text-align: center;
        z-index: 99999999999999999999999999999999999999999999;
    }

    .speed-dial__button {
        margin-left: 200px;
        transition: background 0.2s, opacity 0.2s, transform 0.2s;
        z-index: 99999999999999999999999999999999999999999999;
    }

    .speed-dial__button:active {
        background: #aaaaaa;
        z-index: 99999999999999999999999999999999999999999999;
    }

    .speed-dial__button--primary {
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
        z-index: 99999999999999999999999999999999999999999999;
        background-color: #63b3ed;
    }

    .speed-dial__button--primary:active {
        background: #1a202c;
        z-index: 99999999999999999999999999999999999999999999;
    }

    .speed-dial__button:not(.speed-dial__button--primary) {
        opacity: 0;
        transform: translateY(40px);
        visibility: hidden;
        z-index: 99999999999999999999999999999999999999999999;
    }

    .speed-dial--active .speed-dial__button {
        opacity: 1;
        transform: translateY(0);
        visibility: visible;
        z-index: 99999999999999999999999999999999999999999999;
    }
</style>
@endpush

@push('js')
<script>
    (function() {
        var speedDialContainer = document.querySelector(".speed-dial");
        var primaryButton = speedDialContainer.querySelector(
            ".speed-dial__button--primary"
        );

        document.addEventListener("click", function(e) {
            var classList = "speed-dial";
            var primaryButtonClicked =
                e.target === primaryButton || primaryButton.contains(e.target);
            var speedDialIsActive =
                speedDialContainer.getAttribute("class").indexOf("speed-dial--active") !==
                -1;

            if (primaryButtonClicked && !speedDialIsActive) {
                classList += " speed-dial--active";
            }

            speedDialContainer.setAttribute("class", classList);
        });
    })();

</script>
@endpush

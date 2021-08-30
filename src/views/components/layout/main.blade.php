<!DOCTYPE html>
<html lang="en" data-theme="light" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Unityuser' }}</title>
    <link href="{{ asset('vendor/Unityuser/css/app.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body>

    <div id="app" class="">
        <x-unity-user::layout.flash />
        @if (Auth::check())
            <x-unity-user::layout.navbar />
        @endif
        {{ $slot }}
    </div>

    <script src="{{ asset('vendor/Unityuser/js/app.js') }}"></script>
    <script src="{{ asset('vendor/Unityuser/js/vue.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast            : true,
            position         : 'top',
            showConfirmButton: false,
            timer            : 3000,
            timerProgressBar : true,
            didOpen          : (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            });
    </script>
    @stack('js')
</body>

</html>

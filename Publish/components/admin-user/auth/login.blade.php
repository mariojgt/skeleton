<x-unity-user::auth.authconteiner title="Login" image="/vendor/Unityuser/image/unity-user.png">
    <x-slot name="form">
        <x-onixserver::form.form action="{{ route('login.user') }}">
            <div class="space-y-4">
                <x-unity-user::form.form action="{{ route('login.user') }}">
                    <x-unity-user::form.email name="email" label="Email" />
                    <x-unity-user::form.password name="password" label="Password" />
                    <x-unity-user::form.submit />
                </x-unity-user::form.form>
            </div>
        </x-onixserver::form.form>
    </x-slot>

    <x-slot name="links">
        <div class="text-center mt-6">
            <x-unity-user::form.link route="{{ route('forgot-password') }}" name="Forgot Password" />
        </div>
    </x-slot>
</x-unity-user::auth.authconteiner>

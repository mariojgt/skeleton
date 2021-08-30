<x-unity-user::layout.login>
    <x-unity-user::auth.authconteiner title="Password Reset" subtitle="reset your password here." >
        <x-slot name="form">
            <x-unity-user::form.form action="{{ route('password-reset') }}">
                <div class="space-y-4">
                    <x-unity-user::form.email name="email" label="Email" />
                    <x-unity-user::form.submit name="Reset" />
                </div>
            </x-unity-user::form.form>
        </x-slot>

        <x-slot name="links">
            <div class="text-center mt-6">
                <x-unity-user::form.link route="{{ route('login') }}" name="Login" />
            </div>
        </x-slot>
    </x-unity-user::auth.authconteiner>
</x-unity-user::layout.login>

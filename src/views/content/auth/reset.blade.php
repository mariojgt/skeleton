<x-unity-user::layout.login>
    <x-unity-user::auth.authconteiner title="Password Reset" >
        <x-slot name="form">
            <x-unity-user::form.form action="{{ route('password-reset') }}" >
                <div class="space-y-4">
                    <x-unity-user::form.email name="email" label="Email" />
                    <x-unity-user::form.submit />
                </div>
            </x-unity-user::form.form>
        </x-slot>

        <x-slot name="links">
            <div class="px-5 py-7">
                <div class="grid grid-cols-1 gap-3">
                    <x-unity-user::form.link route="{{ route('login') }}" name="Login" />
                </div>
            </div>
        </x-slot>
    </x-unity-user::auth.authconteiner>
</x-unity-user::layout.login>

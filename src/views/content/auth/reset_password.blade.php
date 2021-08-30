<x-unity-user::layout.login>
    <x-unity-user::auth.authconteiner title="Password Change Reset" >
        <x-slot name="form">
            <x-unity-user::form.form action="{{ route('password.change') }}" >
                <div class="space-y-4">
                    <input type="hidden" name="token" value="{{ $token }}" >
                    <x-unity-user::form.email name="email" label="Email" value="{{ Request('email') }}" />
                    <x-unity-user::form.password name="password" label="Password" />
                    <x-unity-user::form.password name="password_confirmation" label="Password Confirm" />
                    <x-unity-user::form.submit name="Reset" />
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

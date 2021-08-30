<x-unity-user::auth.authconteiner title="Register">
    <x-slot name="form">
        <x-unity-user::form.form action="{{ route('register.user') }}">
            <div class="space-y-4">
                <x-unity-user::form.text name="first_name" label="First Name" />
                <x-unity-user::form.text name="last_name" label="Last Name" />
                <x-unity-user::form.email name="email" label="Email" />
                <x-unity-user::form.password name="password" label="Password" />
                <x-unity-user::form.password name="password_confirmation" label="Password Confirm" />
                <x-unity-user::form.submit name="Register" />
            </div>

        </x-unity-user::form.form>
    </x-slot>
    <x-slot name="links">
        <div class="text-center mt-6">
            <x-unity-user::form.link route="{{ route('login') }}" name="Login" />
        </div>
    </x-slot>
</x-unity-user::auth.authconteiner>

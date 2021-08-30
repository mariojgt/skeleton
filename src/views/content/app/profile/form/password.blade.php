<x-unity-user::form.form action="{{ route('user.profile.update.password') }}">
    <x-unity-user::form.password name="password" label="Password" />
    <x-unity-user::form.password name="password_confirmation" label="Password Confirmation" />
    <x-unity-user::form.submit name="update" />
</x-unity-user::form.form>

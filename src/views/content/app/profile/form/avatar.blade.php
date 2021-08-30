<x-unity-user::form.form action="{{ route('user.profile.update.avatar') }}" file="true">
    <x-unity-user::form.file name="file" label="Avatar" value="{{ $data->avatar() }}" />
    <x-unity-user::form.switch name="use_gravatar" label="Use Gravatar" value="true" />
    <x-unity-user::form.submit name="update" />
</x-unity-user::form.form>

<x-unity-user::form.form action="{{ route('user.profile.update') }}" method="POST">
    <x-unity-user::form.text name="first_name" label="First Name" value="{{ $data->first_name }}" />
    <x-unity-user::form.text name="last_name" label="Last Name" value="{{ $data->last_name }}" />
    <x-unity-user::form.text name="email" label="Email" value="{{ $data->email }}" />
    <x-unity-user::form.textarea_simple name="description" label="Description" value="{!! $data->description !!}" />
    <x-unity-user::form.submit name="update" />
</x-unity-user::form.form>

<x-unity-user::layout.main>

    <div class="card col-span-1 row-span-3 shadow-lg xl:col-span-2 bg-base-200 m-4">
        <div class="card-body">
            <h1 class="my-4 text-5xl font-bold card-title">Addres Update</h1>
            <x-unity-user::form.form action="{{ route('user.address.update', $data->id) }}">
                <x-unity-user::form.text name="address" required="true" label="{{ __('address') }}"
                    value="{{ $data->address }}" />
                <x-unity-user::form.text name="address_2" label="{{ __('address_2') }}"
                    value="{{ $data->address_2 }}" />
                <x-unity-user::form.text name="town" required="true" label="{{ __('town') }}"
                    value="{{ $data->town }}" />
                <x-unity-user::form.text name="county" required="true" label="{{ __('county') }}"
                    value="{{ $data->county }}" />
                <x-unity-user::form.text name="phone" required="true" label="{{ __('phone') }}"
                    value="{{ $data->phone }}" />
                <x-unity-user::form.text name="postcode" required="true" label="{{ __('postcode') }}"
                    value="{{ $data->postcode }}" />
                <x-unity-user::form.select_normal name="country_id" label="Country" :options="$country"
                    fieldValue="{{ $data->country_id }}" />
                <x-unity-user::form.submit name="update" />
            </x-unity-user::form.form>
        </div>
    </div>

</x-unity-user::layout.main>

{{-- <x-unity-user::form.form action="{{ route('admin.user.password', $data->id) }}">
<x-unity-user::form.password name="password" label="Password" />
<x-unity-user::form.password name="password_confirmation" label="Password Confirmation" />
<x-unity-user::form.submit name="update" />
</x-unity-user::form.form> --}}


<div class="overflow-x-auto">
    <div class="flex justify-between mb-6">
        <div class="text-base-content font-semibold">Manage</div>
        <div class="flex space-x-2">
            <div>

                <label for="my-modal-2" class="btn btn-primary modal-button">New</label>
                <input type="checkbox" id="my-modal-2" class="modal-toggle">
                <div class="modal">
                    <div class="modal-box">
                        {{-- form start --}}
                        <x-unity-user::form.form action="{{ route('user.address.store') }}">

                            <tabs>
                                <tab name="Address" :selected="true">
                                    <x-unity-user::form.text name="address" required="true"
                                        label="{{ __('address') }}" />
                                    <x-unity-user::form.text name="address_2" label="{{ __('address_2') }}" />
                                    <x-unity-user::form.text name="town" required="true" label="{{ __('town') }}" />
                                    <x-unity-user::form.text name="county" required="true" label="{{ __('county') }}" />
                                </tab>
                                <tab name="Information">
                                    <x-unity-user::form.text name="phone" required="true" label="{{ __('phone') }}" />
                                    <x-unity-user::form.text name="postcode" required="true"
                                        label="{{ __('postcode') }}" />
                                    <x-unity-user::form.select_normal name="country_id" label="Country"
                                        :options="$country" />
                                </tab>

                            </tabs>

                        <div class="modal-action">
                            <button type="submit" class="btn btn-primary">Accept</button>
                            <label for="my-modal-2" class="btn">Close</label>
                        </div>
                    </x-unity-user::form.form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th>phone</th>
                <th>postcode</th>
                <th>address</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data->address as $item)
            <tr>
                <th>{{ $item->phone }}</th>
                <th>{{ $item->postcode }}</th>
                <th>{{ $item->address }}</th>
                <th>
                    <div class="btn-group">
                        <a class="btn bg-primary" href="{{ route('user.address.edit', $item->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                        </a>
                        <x-unity-user::utility.confirmDelete route="{{ route('user.address.delete', $item->id) }}"
                            id="{{ $item->id }}" />
                    </div>
                </th>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>phone</th>
                <th>postcode</th>
                <th>address</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

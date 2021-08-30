<x-unity-user::layout.main>


    <div class="card col-span-1 row-span-3 shadow-lg xl:col-span-2 bg-base-200 m-4">
        <div class="card-body">
            <h1 class="my-4 text-5xl font-bold card-title">Profile Information</h1>
            <div class="mb-4 space-x-2 card-actions">
                <div class="w-full" >
                    @include('unity-user::content.app.profile.form.avatar')
                </div>
            </div>
            <div class="mb-4 space-x-2 card-actions">
                <tabs>
                    <tab name="Detatils" :selected="true">
                        @include('unity-user::content.app.profile.form.details')
                    </tab>
                    <tab name="Password update">
                        @include('unity-user::content.app.profile.form.password')
                    </tab>
                    <tab name="Address">
                        @include('unity-user::content.app.profile.form.address')
                    </tab>
                </tabs>
            </div>
        </div>
    </div>

</x-unity-user::layout.main>

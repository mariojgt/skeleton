<x-skeleton::layout.main>

<!-- component -->
<div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
    <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
        <h1 class="font-bold text-center text-2xl mb-5">Skeleton Register</h1>
        <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
            <x-skeleton::form.form action="{{ route('register.user') }}" >
                <div class="px-5 py-7">
                    <x-skeleton::form.text name="name" label="Name" />
                    <x-skeleton::form.email name="email" label="Email" />
                    <x-skeleton::form.password name="password" label="Password" />
                    <x-skeleton::form.password name="password_confirmation" label="Password Confirm" />
                    <x-skeleton::form.submit name="Register" />
                </div>
            </x-skeleton::form.form>
            <div class="py-5">
                <div class="grid grid-cols-2 gap-1">
                    <div class="text-center sm:text-right whitespace-nowrap">
                        <a href="{{ route('login') }}" class="transition duration-200 mx-5 px-5 py-4 cursor-pointer font-normal text-sm rounded-lg text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-200 focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50 ring-inset">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4 inline-block align-text-bottom	">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <span class="inline-block ml-1">Login</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-skeleton::layout.main>

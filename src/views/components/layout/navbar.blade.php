<div class="navbar col-span-1 shadow-lg xl:col-span-3 bg-neutral-focus text-neutral-content ">
    {{-- <div class="flex-none">
        <button class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="inline-block w-6 h-6 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </button>
    </div> --}}
    <div class="flex-none px-2 mx-2"><span class="text-lg font-bold">
            <a href="{{ route('home_dashboard') }}">
                {{ config('app.name') }}
            </a>
        </span>
    </div>
    <div class="flex justify-center flex-1 px-2 mx-2">
        <div class="items-stretch hidden lg:flex">
            @foreach (config('unityuser.menu') as $key => $link)
            <a class="btn btn-ghost btn-sm rounded-btn" href="{{ $link != "#" ? route($link) : "#" }}">
                {{ $key }}
            </a>
            @endforeach
        </div>
    </div>
    <div class="flex-none">

        <x-unity-user::layout.utility.theme />

        <div class="dropdown dropdown-end">
            <button class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-6 h-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                    </path>
                </svg>
                @if (Auth::user()->unreadNotifications()->count() > 0)
                {{ Auth::user()->unreadNotifications()->count() }}
                @endif
            </button>

            <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-96">
                @foreach (Auth::user()->unreadNotifications()->paginate(10) as $item)
                <li>
                    <div
                        class="inline-flex items-center bg-white leading-none text-indigo-600 p-2 shadow text-teal text-sm w-full rounded-full m-1">
                        <a href="{{ route('user.notification.read', $item->id) }}">
                            <span
                                class="inline-flex bg-indigo-600 text-white rounded-full h-6 px-3 justify-center items-center">{{ $item->data['title'] }}</span>
                        </a>
                        <span class="inline-flex px-2">{{ Str::limit($item->data['content'], 50) }}</span>
                    </div>
                </li>
                @endforeach
                <li>
                    <div
                        class="inline-flex items-center bg-white leading-none text-pink-600 p-2 shadow text-teal text-sm w-full rounded-full">
                        <a href="{{ route('user.notification.read-all') }}">
                            <span
                                class="inline-flex bg-pink-600 text-white rounded-full h-6 px-3 justify-center items-center">Read
                                All</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="dropdown dropdown-left">
            <div class="avatar" tabindex="0">
                <div class="w-12 h-12 rounded-full ">
                    <img src="{{ Auth::user()->avatar() }}">
                </div>
            </div>
            <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                <li class="text-base-content">
                    <a href="{{ route('user.profile') }}">Profile</a>
                </li>
                <li class="text-base-content">
                    <a href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>

    </div>
    {{-- <div class="flex-none">
        <button class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="inline-block w-6 h-6 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>
    </div> --}}
</div>

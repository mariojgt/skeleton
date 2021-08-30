<x-unity-user::layout.main>

    <div class="card col-span-1 row-span-3 shadow-lg xl:col-span-2 bg-base-200 m-4">
        <div class="card-body">
            <h2 class="my-4 text-4xl font-bold card-title">{{ $notification->data['title'] }}</h2>
            <p>{{ $notification->data['content'] }}</p>
            <div class="justify-end space-x-2 card-actions">
                <a href="{{ route('user.notification.mark.read', $notification->id) }}" class="btn btn-primary">Read</a>
                <a href="{{ route('user.notification.delete', $notification->id) }}" class="btn btn-secondary">Delete</a>
            </div>
        </div>
    </div>



</x-unity-user::layout.main>

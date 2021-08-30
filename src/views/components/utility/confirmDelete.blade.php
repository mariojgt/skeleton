<label for="delete-modal-{{ $id ?? 'delete' }}" class="btn bg-red-500 modal-button">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
    </svg>
</label>
<input type="checkbox" id="delete-modal-{{ $id ?? 'delete' }}" class="modal-toggle">
<div class="modal">
    <div class="modal-box">
        <div class="alert alert-warning">
            <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="w-6 h-6 mx-2 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                    </path>
                </svg>
                <label>You sure you want to delete ?</label>
            </div>
        </div>
        <div class="modal-action">
            <label for="delete-modal-{{ $id ?? 'delete' }}" class="btn btn-primary"
                onclick="$inputs.modalDelete('{{ $route }}', {{ $reload ?? 'false' }})">Confirm</label>
            <label for="delete-modal-{{ $id ?? 'delete' }}" class="btn">Close</label>
        </div>
    </div>
</div>

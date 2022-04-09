<div>
    <form wire:submit.prevent="submit">
        <div class="modal-header">
            <h5 class="modal-title" id="editProfileLabel">Редакция на профил</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <label class="form-label">Име</label>
            <input type="text" wire:model="user.name" class="form-control">
            @error('user.name')
                <p class="error">{{ $message }}</p>
            @enderror
            <label class="form-label">Email</label>
            <input type="text" value="{{ $user->email }}" autocomplete="off" class="form-control" disabled>
            <label class="form-label">Нова парола</label>
            <input type="password" wire:model="newPassword" autocomplete="off" class="form-control">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отказ</button>
            <button type="submit" class="btn btn-primary">Запис</button>
        </div>
    </form>
</div>

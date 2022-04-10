<div>
    <form wire:submit.prevent="submit">
        <label class="form-label">Име на категорията</label>
        <input type="text" wire:model.lazy="title" class="form-control">
        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary btn-block mt-2">Добавяне</button>
    </form>
</div>

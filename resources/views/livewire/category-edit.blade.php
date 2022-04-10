<div>
    <form wire:submit.prevent="submit">
        <label class="form-label">Име на категорията</label>
        <input type="text" wire:model.lazy="category.name" class="form-control">
        @error('category.name')
            <p class="error">{{ $message }}</p>
        @enderror
        <label class="form-label">URL</label>
        <input type="text" wire:model.lazy="category.slug" class="form-control">
        @error('category.slug')
            <p class="error">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary btn-block mt-2">Редакция</button>
    </form>
</div>

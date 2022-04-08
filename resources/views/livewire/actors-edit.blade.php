<div>
    <form wire:submit.prevent="submit">
        <label class="form-label">Име</label>
        <input type="text" wire:model.lazy="actor.name" class="form-control">
        @error('actor.name')
            <p class="error">{{ $message }}</p>
        @enderror
        <label class="form-label">Дата на раждане</label>
        <input type="text" wire:model="date" autocomplete="off" class="form-control">
        @error('date')
            <p class="error">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary btn-block mt-2">Запис</button>
    </form>
</div>

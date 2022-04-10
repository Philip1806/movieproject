<div>
    <form wire:submit.prevent="submit">
        @if ($imgUrl)
            <div class="row">
                <div class="col-sm">
                    <p>Избрана снимка за актьора:</p>
                    <img src="{{ $imgUrl }}" class="img-fluid" alt="Photo Preview">
                </div>
                <div class="col-sm">
                    <label class="form-label">Име</label>
                    <input type="text" wire:model.lazy="actor.name" class="form-control">
                    @error('actor.name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        @else
            <label class="form-label">Име</label>
            <input type="text" wire:model.lazy="actor.name" class="form-control">
            @error('actor.name')
                <p class="error">{{ $message }}</p>
            @enderror
        @endif
        <label class="form-label">Дата на раждане</label>
        <input type="text" wire:model="date" autocomplete="off" class="form-control">
        @error('date')
            <p class="error">{{ $message }}</p>
        @enderror
        @livewire('image-upload',[],key($actor->id))

        <button type="submit" class="btn btn-primary btn-block mt-2">Запис</button>
    </form>
</div>

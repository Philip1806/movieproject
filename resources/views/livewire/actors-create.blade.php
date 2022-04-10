<div>
    <div class="lead mb-2">
        Добавяне на актьор
    </div>
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
        <div wire:ignore>
            <input type="text" autocomplete="off" id="datepicker" class="form-control">
        </div>
        @livewire('image-upload')

        <button type="submit" class="btn btn-primary btn-block mt-2">Добавяне</button>

    </form>
    <script>
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            onSelect: function(dateText) {
                @this.set('date', dateText);
            }
        });
    </script>
</div>

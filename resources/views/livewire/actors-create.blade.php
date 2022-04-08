<div>
    <div class="lead mb-2">
        Добавяне на актьор
    </div>
    <form wire:submit.prevent="submit">

        <label class="form-label">Име</label>
        <input type="text" wire:model.lazy="actor.name" class="form-control">
        @error('actor.name')
            <p class="error">{{ $message }}</p>
        @enderror
        <label class="form-label">Дата на раждане</label>
        <div wire:ignore>
            <input type="text" autocomplete="off" id="datepicker" class="form-control">
        </div>
        @error('actor.birth_date')
            <p class="error">{{ $message }}</p>
        @enderror
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

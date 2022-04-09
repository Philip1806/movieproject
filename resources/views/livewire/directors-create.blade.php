<div>
    <div class="lead mb-2">
        Добавяне на режисьор
    </div>
    <form wire:submit.prevent="submit">

        <label class="form-label">Име</label>
        <input type="text" wire:model.lazy="director.name" class="form-control">
        @error('director.name')
            <p class="error">{{ $message }}</p>
        @enderror
        <label class="form-label">Дата на раждане</label>
        <div wire:ignore>
            <input type="text" autocomplete="off" id="datepicker1" class="form-control">
        </div>
        @error('director.birth_date')
            <p class="error">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary btn-block mt-2">Добавяне</button>

    </form>
    <script>
        $("#datepicker1").datepicker({
            changeMonth: true,
            changeYear: true,
            onSelect: function(dateText) {
                @this.set('date', dateText);
            }
        });
    </script>
</div>

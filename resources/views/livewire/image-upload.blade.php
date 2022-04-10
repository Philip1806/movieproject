<div>
    <form wire:submit.prevent="submit">

        <label class="form-label">Снимка</label>
        <div class="custom-file my-2">
            <input type="file" wire:model="photo" class="custom-file-input">
            <label class="custom-file-label">Choose...</label>
        </div>

        <div wire:loading wire:target="photo">
            <div class="alert alert-info" role="alert">
                Image is uploading...
            </div>
        </div>
        @if ($photo)
            <p>Преглед:</p>
            <img src="{{ $photo->temporaryUrl() }}" class="img-fluid" alt="Photo Preview">
            <button type="submit" class="btn btn-info btn-block mt-2">Избиране на снимката</button>
        @endif
        @error('photo')
            <span class="error">{{ $message }}</span>
        @enderror
    </form>
</div>

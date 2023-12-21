<div>
    <form wire:submit.prevent="save">
        <input type="file" wire:model="file">
        @error('file') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Upload</button>
    </form>

    @if ($file)
        <div wire:loading wire:target="file">Uploading...</div>
        <progress max="100" wire:loading wire:target="file" value="0"></progress>
    @endif
</div>

<div>
    <form wire:submit='save'>
        <div>
            <label class="text-white" for="name">Name</label>
            <input id="name" type="text" wire:model='form.name'>
            @error('form.name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <input class="w-full bg-black text-white" type="submit" value="Save">
        </div>
    </form>
</div>

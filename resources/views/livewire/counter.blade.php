<div>
    {{ $count }}

    <button wire:click="min">min</button>
    <button wire:click="plus">plus</button>

    <hr>

    {{ $input }}
    <input wire:model.live='input'>

</div>

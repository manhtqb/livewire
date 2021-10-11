<div>
    {{$contact->id}}: Hello {{$contact->name}}: {{now()}}
    <button wire:click="$refresh">refresh</button>
</div>

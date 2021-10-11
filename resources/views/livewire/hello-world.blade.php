<div>
    @foreach($contacts as $key => $contact)
        <div>
            @livewire('say-hi', ['contact' => $contact], key($contact->id))
            <button wire:click="removeContact({{$contact->id}})">Remove</button>
        </div>
    @endforeach


    {{now()}}
</div>


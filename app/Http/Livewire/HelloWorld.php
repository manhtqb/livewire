<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Illuminate\Http\Request;
use Livewire\Component;

class HelloWorld extends Component
{
    public $contacts;

    public function mount()
    {
        $this->contacts = Contact::all();
    }

    public function removeContact($id)
    {
        Contact::find($id)->delete();
        $this->contacts = Contact::all();
    }
    public function render()
    {
        return view('livewire.hello-world');
    }
}

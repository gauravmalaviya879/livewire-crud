<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Session;
use App\Models\contacts;    

class ContactComponent extends Component
{

    public $data, $name, $phone, $selected_id;
    public $updateMode = false;

    public function render()
    {
        $this->data = contacts::all();
        return view('livewire.contacts.component');
    }
    private function resetInput()
    {
        $this->name = null;
        $this->phone = null;
    }
    public function store()
    {
        $this->validate([
            'name' => 'required|min:5',
            'phone' => 'required'
        ]);

        $contact = new contacts();
        $contact->name = $this->name;
        $contact->phone = $this->phone;
        $contact->save();
        

        $this->resetInput();
    }
    public function edit($id)
    {
        $record = contacts::findOrFail($id);

        $this->selected_id = $id;
        $this->name = $record->name;
        $this->phone = $record->phone;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'selected_id' => 'required|numeric',
            'name' => 'required|min:5',
            'phone' => 'required'
        ]);

        if ($this->selected_id) {
            $record = contacts::find($this->selected_id);
            $record->update([
                'name' => $this->name,
                'phone' => $this->phone
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }

    }

    public function destroy($id)
    {
        if ($id) {
            $record = contacts::where('id', $id);
            $record->delete();
        }
    }
}

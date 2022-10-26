<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\PhoneNumber;
use Livewire\Component;

class ListContacts extends Component
{
    Public $contacts;
    Public $deleteId;
    Public $keyword;
    public $showDeleteModal = false;
    protected $listeners = [
        'deleteId',
        'delete',
        'cancel',
    ];

    public function mount()
    {
        $this->loadList();
    }

    public function render()
    {
        return view('livewire.list-contacts');
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function deleteId($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function delete()
    {
        PhoneNumber::where("contact_id",$this->deleteId)->delete();
        Contact::find($this->deleteId)->delete();
        $this->showDeleteModal = false;
        $this->loadList();
    }

    public function loadList()
    {
        $this->contacts = Contact::get();
        $this->showDeleteModal = false;
    }

    public function search()
    {

        $keyword = $this->keyword;
        $this->contacts = Contact::where("first_name",'like','%'.$keyword.'%')
        ->orWhere("last_name",'like','%'.$keyword.'%')
        ->orWhere("middle_name",'like','%'.$keyword.'%')
        ->orWhere("title",'like','%'.$keyword.'%')
        ->orWhere("email",'like','%'.$keyword.'%')
        ->orWhereHas('phones', function($query) use ($keyword){
            $query->where('number', 'like', '%'.$keyword.'%');
        })
        ->orderBy("created_at", "desc")
        ->get();
        $this->showDeleteModal = false;
    }

    public function cancel()
    {
        $this->showDeleteModal = false;

    }
}

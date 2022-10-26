<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\PhoneNumber;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditContact extends Component
{
    public $firstName;
    public $lastName;
    public $middleName;
    public $title;
    public $sufix;
    public $prefix;
    public $email;
    public $defaultPhoneNumber;
    public $phoneType;
    public $isDefault;
    public static $prefixTypes = ['Mr.', 'Mrs.', 'Ms.', 'Miss'];
    public static $sufixTypes = ['Jr.', 'Sr.', 'I', 'II', 'III'];
    public static $phoneTypes = ['Home', 'Office', 'Mobile', 'Fax'];
    public $phones;
    public $contact;
    public $oldDefaultPhoneNumber;

    public function rules()
    {
        return [
            'firstName' => 'required|max:50',
            'lastName' => 'required|max:50',
            'middleName' => 'max:50',
            'title' => 'max:50',
            'email' => 'required|email|unique:contacts,email|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('contacts')->ignore($this->contact->id, 'id')
            ],
            'sufix'=>[
                'nullable',
                 Rule::in(AddContact::$sufixTypes),
             ],
             'prefix'=>[
                'nullable',
                 Rule::in(AddContact::$prefixTypes),
             ],
             'defaultPhoneNumber' => [
                'max:255',
            ]
        ];

    }
    public function mount($id)
    {
        $contact = Contact::findOrFail($id);
        $this->firstName = $contact->first_name;
        $this->lastName = $contact->last_name;
        $this->middleName = $contact->middle_name;
        $this->title = $contact->title;
        $this->email = $contact->email;
        $this->sufix = $contact->sufix;
        $this->prefix = $contact->prefix;
        $this->phones = $contact->phones;
        $this->contact = $contact;
        $this->oldDefaultPhoneNumber = PhoneNumber::where("contact_id",$contact->id)
        ->where("is_default","Y")
        ->first();
        if($this->oldDefaultPhoneNumber) {
            $this->defaultPhoneNumber = $this->oldDefaultPhoneNumber->number;
            $this->phoneType =  $this->oldDefaultPhoneNumber->phone_type;
        }
    }

    public function getPrefixTypes() {
        return AddContact::$prefixTypes;
    }
    public function getSufixTypes() {
        return AddContact::$sufixTypes;
    }
    public function getPhoneTypes() {
        return AddContact::$phoneTypes;
    }
    public function submit()
    {
        $this->validate();

        $this->contact->first_name = $this->firstName;
        $this->contact->last_name = $this->lastName;
        $this->contact->middle_name = $this->middleName;
        $this->contact->title = $this->title;
        $this->contact->email = $this->email;
        $this->contact->sufix = $this->sufix;
        $this->contact->prefix = $this->prefix;
        $this->contact->save();

        if($this->oldDefaultPhoneNumber && $this->oldDefaultPhoneNumber->number !== $this->defaultPhoneNumber ) {
                $this->oldDefaultPhoneNumber->is_default = 'N';
                $this->oldDefaultPhoneNumber->save();

            PhoneNumber::create([
                'contact_id' => $this->contact->id,
                'number' => $this->defaultPhoneNumber,
                'phone_type' => $this->phoneType,
                'is_default' => 'Y'
            ]);
        }

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.edit-contact');
    }
}

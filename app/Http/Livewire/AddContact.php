<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\PhoneNumber;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddContact extends Component
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

    public function rules()
    {
        return [
            'firstName' => 'required|max:50',
            'lastName' => 'required|max:50',
            'middleName' => 'max:50',
            'title' => 'max:50',
            'email' => 'required|email|unique:contacts,email|max:255',
            'sufix'=>[
                'nullable',
                 Rule::in(AddContact::$sufixTypes),
             ],
             'prefix'=>[
                'nullable',
                 Rule::in(AddContact::$prefixTypes),
             ],
             'defaultPhoneNumber' => 'required|unique:phone_numbers,number|max:255',
             'phoneType'=>[
                'required',
                Rule::in(AddContact::$phoneTypes),
            ]
        ];
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

        $contact = Contact::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'middle_name' => $this->middleName,
            'title' => $this->title,
            'email' => $this->email,
            'sufix' => $this->sufix,
            'prefix' => $this->prefix,
        ]);
        PhoneNumber::create([
            'contact_id' => $contact->id,
            'number' => $this->defaultPhoneNumber,
            'phone_type' => $this->phoneType,
            'is_default' => 'Y'
        ]);
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.add-contact');
    }
}

<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Models\Territory;
use Illuminate\Support\Facades\Hash;

class FormModel extends Component
{
    protected $listeners  = ['create', 'edit'];
    protected function rules()
    {
        return [
            'name' => 'required|max:190',
            'nic' => 'required|min:10|max:12|unique:users,nic,'.$this->user_id,
            'address' => 'required|max:190',
            'email' => 'nullable|email|max:190|unique:users,email,'.$this->user_id,
            'gender' => 'nullable|in:male,female',
            'mobile' => 'required|size:10|unique:users,mobile,'.$this->user_id,
            'territory_id' => 'required|exists:territories,id',
            'username' => 'required|max:100|unique:users,username,'.$this->user_id,
            'password' => 'required|min:6|max:190|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/'
        ];
    }

    protected $messages = [
        'password.regex' => 'The Password must contain at least one character and one number',
    ];

    public $territories = [];

    public $formTitle = '';
    public $modelUserForm = false;

    public $user_id, $name, $nic, $address, $mobile, $email, $gender, $territory_id, $username, $password;

    public function mount()
    {
        $this->territories = Territory::all();
    }


    public function create()
    {
        $this->formReset();

        $this->modelUserForm = true;
        $this->formTitle = 'Add User/Distributor';
    }
    

    public function store()
    {
        $this->validate();
        // dd($this->username);

        $user = User::updateOrCreate(['id' => $this->user_id ?? null ],[
            'name' => $this->name,
            'nic' => $this->nic,
            'address' => $this->address,
            'email' => $this->email,
            'gender' => $this->gender,
            'mobile' => $this->mobile,
            'territory_id' => $this->territory_id,
            'username' => $this->username,
        ]);

    
        $this->passwordUpdate($user);


        session()->flash('successUser', $this->user_id ? 'User Updated!' : 'User Created!');

        $this->emitTo('user.index', 'refreshIndex');
        $this->formReset();

    }

    public function passwordUpdate($user)
    {
        $user->update([
            'password' => Hash::make($this->password)
        ]);
    }

    public function formReset()
    {
        $this->resetErrorBag();

        $this->reset([ 'name', 'nic', 'address', 'email', 'mobile', 'gender', 'territory_id', 'username', 'password']);
        $this->user_id = null;
    }

    public function edit(User $user)
    {
        $this->formReset();

        $this->formTitle = 'Update User/Distributor';
        $this->modelUserForm = true;

        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->nic = $user->nic;
        $this->address = $user->address;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->gender = $user->gender;
        $this->territory_id = $user->territory->id;
        $this->username = $user->username;
    }

    public function render()
    {
        return view('livewire.user.form-model');
    }
}

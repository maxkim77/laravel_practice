<?php

namespace App\Livewire;

use Livewire\Component;

class Practice extends Component
{

    public $post; // 기본값을 여기에 설정할 수 있습니다.
    public $clicked = '클릭 이전';
    public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        "name.required" => "이름을 입력해주세요",
        "name.min" => "이름은 최소 6자 이상이어야 합니다",
        "email.required" => "이메일을 입력해주세요",
    ];

    public function click()
    {
        $this->clicked = '클릭 이후';
    }

    public function validation()
    {
        $this->validate();
    }

  
    public function render()
    {
        return view('livewire.practice',['post' => $this->post]);
    }
}

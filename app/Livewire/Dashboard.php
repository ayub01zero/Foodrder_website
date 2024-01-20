<?php

namespace App\Livewire;
use App\Models\Feedback;
use Livewire\Component;


class Dashboard extends Component
{

    public $full_name;
    public $email;
    public $subject;
    public $message;


    public function savePost()
{
        Feedback::insert([

           'full_name' => $this->full_name,
           'email' => $this->email,
           'subject' => $this->subject,
           'message_feedback' => $this->message,

        ]);
        
        session()->flash('status', 'Information Added we will contact you soon');
    

    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}

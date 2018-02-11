<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\AnonimRequest;

class NewRegistration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $enroll;

    public function __construct(User $user, AnonimRequest $enroll)
    {
        $this->user = $user;
        $this->enroll = $enroll;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-registration')->with(['user' => $this->user, 'enroll' => $this->enroll]);
    }
}

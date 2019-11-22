<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Team;
use App;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $team;
    public $confirmLink;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Team $team)
    {
        $url = config('app.url');
        $this->team = $team;
        $this->confirmLink = $url . '/confirm/' . $team->code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.verifyMail');
    }
}

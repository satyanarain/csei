<?php

namespace App\Mail;

use App\Models\User;
use App\Models\CSEIRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $verifier;
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $verifier, CSEIRequest $request)
    {
        $this->verifier = $verifier;
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.requests.created')
                    ->subject('Request Created | CSEI');
    }
}

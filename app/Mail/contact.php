<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $contact ;

    public function __construct(Array $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->contact['type'] == 0) return $this->view('emails.bonDeCommande'); // 0 c'est dire le bon de commande est destiné à un fournisseur
        if ($this->contact['type'] == 1) return $this->view(('emails.bonDeCommandeClient')); //  c'est à dire le bon de commande est destiné à un client
    }
}

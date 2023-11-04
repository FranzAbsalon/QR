<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];
    public $img;
        /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$img)
    {
        $this->data = $data;
        $this->img = $img;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
      
        return $this->from('johnfrancisabsalon17@gmail.com', 'PSU - UCC Student Services Unit')
            ->subject($this->data["subject"])
            ->attach($this->img, [
                'as' => 'Certificate Template.pdf',
                'mime' => 'assets/pdf',
            ])
            ->view('emails.sent')->with("data", $this->data);
    }
}

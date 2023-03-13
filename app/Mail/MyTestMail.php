<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $forgot_token, $name;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($forgot_token, $name)
    {
        $this->forgot_token = $forgot_token;
        $this->name = $name;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail nhom 8')
            ->view('check_email', ['forgot_token', $this->forgot_token, $this->name]);
    }
}
<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CandidateEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $user = User::find($this->id);
        return $this->to($user->email)
                    ->view('mails.candidate_email')
                    ->with(
                      [
                            'user' => $user,
                            
                      ]);
                    //   ->attach(public_path('/images').'/demo.jpg', [
                    //           'as' => 'demo.jpg',
                    //           'mime' => 'image/jpeg',
                    //   ]);
    }
}

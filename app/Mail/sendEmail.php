<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $all_data;
    public function __construct($data)
    {
        $this->all_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->file_info = array(
            'as' => $this->all_data['file_name'],
            'mime' => $this->all_data['mime']
        );

        // return $this->view('emailTemplate')
        // ->attach(public_path('pdf/sample.pdf'), [
        //      'as' => 'sample.pdf',
        //      'mime' => 'application/pdf'
        // ]);

        return $this->subject($this->all_data['subject'])->view('emailTemplate',array(
            'url' => $this->all_data['erp_url'],
            'pass' => $this->all_data['pass']
        ));


        // return $this->view('emailTemplate')->attach($this->all_data['file_path'], $this->file_info);

    }
}

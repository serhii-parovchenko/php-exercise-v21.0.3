<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array $data
     */
    private array $data;

    /**
     * Create a new message instance.
     *
     * @param array $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('serhii_parovchenko@epam.com', 'Serhii Parovchenko')
            ->to($this->data['email'])
            ->subject($this->data['company_symbol'] . ' => ' . $this->data['company_name'])
            ->view('emails.company.index', [
                'start_date' => $this->data['start_date'],
                'end_date' => $this->data['end_date'],
            ]);
    }
}

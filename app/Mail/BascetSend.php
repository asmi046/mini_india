<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BascetSend extends Mailable
{
    use Queueable, SerializesModels;

    protected $formData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("asmi-work046@yandex.ru","Mini-India")
            ->subject("Заказ с сайта Mini-India")
            ->replyTo('info@asmi-studio.ru', 'Магазин')
            ->view('mail.bascetmail')
            ->with([
            "formData" => $this->formData
        ]);
    }
}

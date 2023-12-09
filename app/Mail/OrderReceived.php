<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class OrderReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $content;

    public $dishes;
    public function __construct(Order $order, $content)
    {
        $this->order = $order;
        $this->content = $content;
        $this->dishes = $order->dishes;
    }


    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $content = $this->content;
        $subject = ($content === 'owner') ? 'Hai ricevuto un nuovo ordine' : 'Ordine confermato';
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $order = $this->order;
        $content = $this->content;
        $dishes = $this->dishes;

        $view = ($content === 'owner') ? 'mail.orderReceivedOwner' : 'mail.orderReceivedCustomer';
        return new Content(
            view: $view,
            with: compact('order', 'content', 'dishes'),
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
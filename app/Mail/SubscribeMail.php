<?php

namespace App\Mail;

use App\UploadStudent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Product;
class SubscribeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $uploadStudent;
    protected $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(UploadStudent $uploadStudent, Product $product)
    {
        $this->student = $uploadStudent;
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.subscribe')->with(['studentName' => $this->student->last_name, 'productName' => $this->product->product_name]);
    }
}

<?php

namespace App\Mail;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use FontLib\Table\Type\name;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ProductInfo extends Mailable
{
    use Queueable, SerializesModels;

    private Product $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        //
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        $this->subject('Regardez ce produit ! ' . $this->product->name);
        $this->attach(public_path($this->product->image));

        $pdf = PDF::loadView('products.pdf', ['product' => $this->product]);
        $this->attachData($pdf->output(), Str::slug($this->product->name).'.pdf', [
            'mime'=>'application/pdf',
        ]);

        return $this->view('mail.product-info', [
            'product' => $this->product,
            ]);
    }
}

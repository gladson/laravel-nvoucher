<?php

namespace App\Mail;

use App\Voucher;
use App\VoucherUser;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VoucherUserEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The voucheruser instance.
     *
     * @var VoucherUser
     */
    protected $voucher_user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($voucher_user_key_create, $voucher_user_create)
    {
        $this->voucher_user_key_create = $voucher_user_key_create;
        $this->voucher_user_create = $voucher_user_create;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        #return $this->view('emails.voucher_user_keys');

        $address = 'no-rep@gladson.com.br';
        $name = 'Voucher';
        $subject = 'Cupom do desconto';
        $chave = $this->voucher_user_key_create;
        $nome = $this->voucher_user_create;

        return $this->view('emails.voucher_user_keys')
                    ->from($address, $name)
                    #->cc($address, $name)
                    #->bcc($address, $name)
                    #->replyTo($address, $name)
                    ->subject($subject)
                    ->with([
                        'chave' =>  $chave,
                        'nome' =>  $nome,
                    ]);
    }
}

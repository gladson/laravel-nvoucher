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
    public function __construct($voucher_user)
    {
        $this->voucher_user = $voucher_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        #return $this->view('emails.voucher_user_keys');
        #return $this->from('no-rep@gladson.com.br')->subject('Voucher')->view('emails.voucher_user_keys');

        $address = 'no-rep@gladson.com.br';
        $name = 'Voucher';
        $subject = 'Cupom do desconto';

        return $this->view('emails.voucher_user_keys')
                    ->from($address, $name)
                    #->cc($address, $name)
                    #->bcc($address, $name)
                    #->replyTo($address, $name)
                    ->subject($subject);
                    #->with([
                    #    'chave' =>  $this->voucher_user->chave,
                    #    'nome' =>  $this->voucher_user->user->name,
                    #]);
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class VoucherUser extends Model
{
    use Notifiable;

    # Define o relacionamento - Importante
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    # Define o relacionamento - Importante
    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chave', 'user_id', 'voucher_id',
    ];

    public $table = "voucher_user";
}

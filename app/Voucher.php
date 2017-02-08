<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chave', 'desconto_valor', 'desconto_tipo', 'desconto_descricao', 
        'user_id', 'status', 'data_inicio', 'data_fim',
    ];

    public $table = "voucher";
}

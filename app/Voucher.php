<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use Notifiable;

    # Define o relacionamento - Importante
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'desconto_valor', 'desconto_tipo', 'desconto_descricao', 
        'user_id', 'data_inicio', 'data_fim',
    ];

    public $table = "voucher";
}

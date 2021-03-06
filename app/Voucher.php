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

    public function getId()
    {
      return $this->id;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'desconto_valor', 'desconto_tipo', 'desconto_descricao', 
        'user_id', 'status', 'data_inicio', 'data_fim',
    ];

    public $table = "voucher";
}

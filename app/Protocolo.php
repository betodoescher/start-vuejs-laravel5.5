<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Protocolo extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'formulario_id',
        'protocolo'

    ];

    /**
     * @return mixed
     */
    public function formulario()
    {
        return  $this->belongsTo(Formulario::class);
    }
}

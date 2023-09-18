<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SessionControl extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'session_control';
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'fecha',
        'estado',
        'token',
        'idusuario'
    ];
}

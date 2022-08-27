<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['name', 'id_category_cita', 'id_state_cita', 'fecha', 'observacion'];
}

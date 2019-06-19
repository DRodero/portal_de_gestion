<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $guarded = [];

    public function incidencias() {
        return $this->hasMany(Incidencia::class);
    }
}

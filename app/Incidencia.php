<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $guarded = [];

    public function proyecto() {
        return $this->belongsTo(Proyecto::class);
    }
}

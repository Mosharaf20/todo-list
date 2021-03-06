<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $guarded = [];
    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}

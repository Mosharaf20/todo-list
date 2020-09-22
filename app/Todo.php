<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title','user_id','description','completed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute($value){
        return ucfirst($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }
}

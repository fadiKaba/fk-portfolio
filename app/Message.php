<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{   
    protected $fillable = ['to', 'from', 'message', 'is_read', 'deleted'];

    public function sender(){
        return $this->belongsTo('App\User', 'from');
    }
    public function reciever(){
        return $this->belongsTo('App\User', 'to');
    }
}

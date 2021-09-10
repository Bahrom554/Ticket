<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [ 'price','time_go', 'time_arrive','date','from_id','to_id','status' ];
    public function region(){
        return $this->belongsTo(Region::class,'from_id');
    }
    public function reg(){
        return $this->belongsTo(Region::class,'to_id');

    }

}

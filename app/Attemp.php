<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attemp extends Model
{
    protected $table = 'attemps';
    protected $primaryKey = 'id';
    protected $with = ['user' , 'challenge'];

    protected $fillable = [
        'user_id','challenge_id','status',
        'time', 'attemp','answer'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id'); 
    
    } 
    public function challenge()
    {
        return $this->belongsTo('App\Challenge', 'challenge_id', 'id'); 
    
    } 
}

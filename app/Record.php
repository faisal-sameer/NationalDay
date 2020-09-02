<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Record extends Model
{
    protected $table = 'records';
    protected $primaryKey = 'id';
    protected $with = ['user' , 'challenge'];

    protected $fillable = [
        'user_id','challenge_id','status',
        'time', 'from'
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

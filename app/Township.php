<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Township extends Model
{
    use SoftDeletes;
    protected $fillable=[
    	'name','price'
    ];

    public function user(){
    	return $this->hasOne('App\User');
    }
}

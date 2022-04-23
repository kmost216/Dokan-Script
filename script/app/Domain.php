<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    //protected $table="sub_domains";

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function theme()
    {
    	return $this->belongsTo('App\Models\Template','template_id','id');
    }
}

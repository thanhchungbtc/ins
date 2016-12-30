<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    	'name', 'description', 'investor', 'price'
    ];

    public function category()
    {
    	return $this->belongsTo(App\Category::class);
    }

}

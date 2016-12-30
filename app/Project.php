<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    	'name', 'category_id', 'description', 'investor', 'price'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'project_photos';

    protected $fillable = ['path'];

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }
}

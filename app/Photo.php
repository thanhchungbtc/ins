<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'project_photos';

    protected $fillable = ['path', 'thumbnailPath'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function delete()
    {
        if (parent::delete()) {
            \File::delete($this->path);
            \File::delete($this->thumbnailPath);

            return true;
        }
        return false;
    }
}

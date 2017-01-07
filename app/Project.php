<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $baseDir = 'images/projects';

    protected $fillable = [
    	'name', 'category_id', 'description', 'investor', 'price'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function addPhotos($files)
    {
        foreach ($files as $file) {
            $filename = time() . $file->getClientOriginalName();
            $filepath = $this->baseDir . '/' . $filename;
            $this->photos()->create(['path' => $filepath]);
            $file->move($this->baseDir, $filename);
        }
    }
}

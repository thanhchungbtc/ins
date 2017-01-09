<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Project extends Model
{
    protected $baseDir = 'images/projects';

    protected $fillable = [
    	'name', 'category_id', 'description', 'investor', 'price', 'complete'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function delete()
    {
        if (parent::delete()) {
            foreach($this->photos as $photo) {
                $photo->delete();
            }
            return true;
        }
        return false;
    }

    public function addPhotos($files)
    {
        if (empty($files)) { return; }

        foreach ($files as $file) {
            // Upload image
            $filename = time() . $file->getClientOriginalName();
            $path = $this->baseDir . '/' . $filename;
            $thumbnailPath = $this->baseDir . '/tn-' . $filename;

            $file->move($this->baseDir, $filename);
            $this->photos()->create(['path' => $path, 'thumbnailPath' => $thumbnailPath]);
            // Upload thumbnail
            Image::make($path)
                ->fit(450, 300)
                ->save($thumbnailPath);
        }
    }
}

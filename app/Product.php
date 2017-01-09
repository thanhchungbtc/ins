<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;

class Product extends Model
{
   	protected $baseDir = 'images/products';

    protected $fillable = [
    	'name', 'product_category_id', 'name', 'short_description', 'description', 'price'
    ];

    public function category()
    {
    	return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class);
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
                ->fit(300, 300)
                ->save($thumbnailPath);
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $table = 'product_photos';

    protected $fillable = ['path', 'thumbnailPath'];

    public function product()
    {
        return $this->belongsTo(Product::class);
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

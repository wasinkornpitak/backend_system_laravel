<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'news_id';

    public function NewsHasNewsCategory(){
        return $this->hasMany('\App\NewsHasNewsCategory', 'news_id', 'news_id');
    }

    public function NewsCategory(){
        return $this->hasMany('\App\NewsHasNewsCategory', 'news_id', 'news_id');
    }

    public function NewsHasNewsTag(){
        return $this->hasMany('\App\NewsHasNewsTag', 'news_id', 'news_id');
    }

    public function NewsDetail(){
        return $this->hasMany('\App\NewsDetail', 'news_id', 'news_id');
    }

    public function NewsGallery(){
        return $this->hasMany('\App\NewsGallery', 'news_id', 'news_id');
    }

    public function PathImage()
    {
        return 'uploads/NewsImage/';
    }

    public function viewImage()
    {
        $image  = 'uploads/images/no-image.jpg';
        if ($this->news_thumbnail) {
            if (File::exists($this->PathImage().$this->news_thumbnail)) {
                $image = $this->PathImage().$this->news_thumbnail;
            }
        }
        return $image;
    }
}

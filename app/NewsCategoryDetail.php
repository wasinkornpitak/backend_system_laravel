<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategoryDetail extends Model
{
    protected $table = 'news_category_details';
    protected $primaryKey = 'news_category_details_id';

    public function Language(){
        return $this->hasOne('\App\Language', 'languages_id', 'languages_id');
    }
    public function NewsCategory(){
        return $this->hasOne('\App\NewsCategory', 'news_category_id', 'news_category_id');
    }

    public function NewsCategoryBannerSlide(){
        return $this->hasMany('\App\NewsCategoryBannerSlide', 'news_category_id', 'news_category_id')->orderBy('news_category_banner_slide_sort');
    }
}

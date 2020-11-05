<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\News;
use App\NewsCategory;
use App\NewsDetail;
use App\NewsHasNewsCategory;
use App\NewsTag;
use App\NewsHasNewsTag;
use App\Language;
use App\NewsGallery;
use App\NewsBannerSlide;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'News')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['NewsCategory'] = NewsCategory::get();
        $data['NewsTag'] = NewsTag::where('news_tag_status', '1')->get();
        $data['Language'] = Language::where('languages_status', '1')->get();
        $data['SeoTypes'] = [
            "0" => "ใช้ SEO หลัก",
            "1" => "ใช้ SEO ตามภาษา"
        ];
        $data['ImageTypes'] = [
            "0" => "ใช้รูปหลักเป็นปก",
            "1" => "ใช้รูปตามเนื้อกิจกรรมเป็นปก (แยกตามภาษา)"
        ];
        if (Helper::CheckPermissionMenu('News', '1')) {
            return view('admin.News.news', $data);
        } else {
            return redirect('admin/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $news_category_id = $request->input('news_category_id');
        $news_detail = $request->input('news_details');
        // $news_tag_id = $request->input('news_tag_id');
        $news_gallery_banner = $request->input('news_banner_gal');
        $news = $request->input('news');
        $news_banner = $request->input('news_category_banner');

        // return $news;

        $url_temp = public_path('uploads/NewsGalleryTemp');
        $url_upload = public_path('uploads/NewsGallery');
        $img_detail_url_temp = public_path('uploads/NewsImageTemp');
        $img_detail_url_upload = public_path('uploads/NewsImage');
        $img_cover_url_temp = public_path('uploads/NewsBannerSlideTemp');
        $img_cover_url_upload = public_path('uploads/NewsBannerSlide');

        $validator = Validator::make($request->all(), [
            // 'news_seo_title' => 'required',
        ]);
        $array = array();
        // foreach ($news_detail as $key => $val) {
        // }
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if ($news) {
                    $News = new News;
                    foreach ($news as $key => $val) {
                        $News->{$key} = $val;
                    }

                    if(!isset($news['news_related_news_status'])){
                        $News->news_related_news_status = 0;
                    }else{
                        if($news['news_related_news_status'] == 'on' && !empty($news['news_related_news_status'])){
                            $News->news_related_news_status = 1;
                        }else{
                            $News->news_related_news_status = 0;
                        }
                    }

                    if(!isset($news['news_gallery_status'])){
                        $News->news_gallery_status = 0;
                    }else{
                        if($news['news_gallery_status'] == 'on' && !empty($news['news_gallery_status'])){
                            $News->news_gallery_status = 1;
                        }else{
                            $News->news_gallery_status = 0;
                        }
                    }

                    if(!isset($news['news_status'])){
                        $News->news_status = 0;
                    }else{
                        if($news['news_status'] == 'on' && !empty($news['news_status'])){
                            $News->news_status = 1;
                        }else{
                            $News->news_status = 0;
                        }
                    }

                    if(!isset($news['news_banner_status'])){
                        $News->news_banner_status = 0;
                    }else{
                        if($news['news_banner_status'] == 'on' && !empty($news['news_banner_status'])){
                            $News->news_banner_status = 1;
                        }else{
                            $News->news_banner_status = 0;
                        }
                    }

                    if(isset($news['news_mata_robots'])){
                        $News->news_mata_robots = json_encode($news['news_mata_robots'], JSON_UNESCAPED_UNICODE);
                    }else{
                        $News->news_mata_robots = json_encode(array(), JSON_UNESCAPED_UNICODE);
                    }

                    if (isset($news['news_og_twitter_image'])) {
                        $image = '';
                        $image = str_replace("NewsImageTemp/", "", $news['news_og_twitter_image']);
                        $News->news_og_twitter_image = $image;
                        copy($img_detail_url_temp . '/' . $image, $img_detail_url_upload . '/' . $image);
                    }

                    if (isset($news['news_thumbnail'])) {
                        $image = '';
                        $image = str_replace("NewsImageTemp/", "", $news['news_thumbnail']);
                        $News->news_thumbnail = $image;
                        copy($img_detail_url_temp . '/' . $image, $img_detail_url_upload . '/' . $image);
                    }

                    $News->save();
                    $news_id = $News->getKey();
                }

                if ($news_detail) {

                    foreach ($news_detail as $key => $value) {
                        $NewsDetail = new NewsDetail;
                        $NewsDetail->languages_id = $value['languages_id'];
                        $NewsDetail->news_details_content_details = $value['news_details_content_details'];
                        $NewsDetail->news_details_languages_code = $value['news_details_languages_code'];
                        $NewsDetail->news_details_short_description = $value['news_details_short_description'];
                        $NewsDetail->news_details_title = $value['news_details_title'];
                        $NewsDetail->news_id = $news_id;
                        $NewsDetail->save();
                        // foreach ($value as $k => $val) {
                        //     $NewsDetail->{$k} = $val;
                        //     $NewsDetail->news_id = $news_id;
                        //     $NewsDetail->save();
                        // }
                    }
                }

                if ($news_banner) {
                    foreach($news_banner as $keys_banner=> $value_banner){
                        foreach ($value_banner as $key => $val) {
                            $NewsBannerSlide = new NewsBannerSlide;

                            foreach($val as $k=> $v){
                                $NewsBannerSlide->{$k} = $v;
                            }

                            if (isset($NewsBannerSlide->news_banner_slide_image)) {
                                $image = '';
                                $image = str_replace("NewsBannerSlideTemp/", "", $NewsBannerSlide->news_banner_slide_image);
                                $NewsBannerSlide->news_banner_slide_image = $image;
                                copy($img_cover_url_temp . '/' . $image, $img_cover_url_upload . '/' . $image);
                            }

                            $NewsBannerSlide->news_id = $news_id;
                            $NewsBannerSlide->save();
                        }
                    }
                }

                if ($news_category_id) {
                    foreach ($news_category_id as $val) {
                        $NewsHasNewsCategory = new NewsHasNewsCategory;
                        $NewsHasNewsCategory->news_category_id = $val;
                        $NewsHasNewsCategory->news_has_news_category_status = '1';
                        $NewsHasNewsCategory->news_id = $news_id;
                        $NewsHasNewsCategory->save();
                    }
                }

                if ($news_gallery_banner) {
                    foreach ($news_gallery_banner as $val) {
                        $NewsGallery = new NewsGallery;

                        foreach($val as $k=> $v){
                            $NewsGallery->{$k} = $v;
                        }

                        if (isset($NewsGallery->news_gallery_image_gall)) {
                            $image = '';
                            $image = str_replace("NewsGalleryTemp/", "", $NewsGallery->news_gallery_image_gall);
                            $NewsGallery->news_gallery_image_gall = $image;
                            copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                        }

                        $NewsGallery->news_id = $news_id;
                        $NewsGallery->save();
                    }
                }

                $files = glob($url_temp.'/*');
                foreach($files as $file){
                    if(is_file($file))
                        unlink($file);
                }

                $files = glob($img_cover_url_temp.'/*');
                foreach($files as $file){
                    if(is_file($file))
                        unlink($file);
                }

                $files = glob($img_detail_url_temp.'/*');
                foreach($files as $file){
                    if(is_file($file))
                        unlink($file);
                }

                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['news_seo_title']['required'])) {
                $return['status'] = 2;
                $return['title'] = "News is required";
            }
        }
        $return['title'] = 'Insert';
        return $return;
    }

    // public function store(Request $request)
    // {
    //     $news_category_id = $request->input('news_category_id');
    //     $news_detail = $request->input('lang');
    //     $news_tag_id = $request->input('news_tag_id');
    //     $news_gallery_type = $request->input('news_gallery_type');
    //     $news = $request->input('news');

    //     // $url_news_cover_temp = public_path('uploads/EventCoverTemp');
    //     // $url_news_cover_upload = public_path('uploads/EventCover');
    //     $url_temp = public_path('uploads/NewsGalleryTemp');
    //     $url_upload = public_path('uploads/NewsGallery');
    //     $img_detail_url_temp = public_path('uploads/NewsImageTemp');
    //     $img_detail_url_upload = public_path('uploads/NewsImage');
    //     $img_cover_url_temp = public_path('uploads/NewsCoverTemp');
    //     $img_cover_url_upload = public_path('uploads/NewsCover');

    //     $file_name_all = $this->readDir($url_temp);
    //     $file_name_all_mg_detail_temp = $this->readDir($img_detail_url_temp);
    //     $file_cover_temp = $this->readDir($img_cover_url_temp);

    //     $file_name_all = $this->readDir($url_temp);

    //     $validator = Validator::make($request->all(), [
    //         // 'news_seo_title' => 'required',
    //     ]);
    //     $array = array();

    //     // foreach ($news_detail as $key => $val) {
    //     // }
    //     if (!$validator->fails()) {
    //         \DB::beginTransaction();
    //         try {
    //             if ($news) {

    //                 $News = new News;
    //                 $Language = Language::where('languages_type', '1')->first();
    //                 if ($news_detail) {
    //                     foreach ($news as $key => $val) {
    //                         $News->{$key} = $val;
    //                     }
    //                     if (!isset($news['news_status'])) {
    //                         $News->news_status = 0;
    //                     }
    //                     if (isset($news['news_image'])) {
    //                         // $data_pic = explode('/', $news['news_image']);
    //                         // $cout_path = count($data_pic);
    //                         // $pic_name =  $data_pic[$cout_path - 1];
    //                         // $News->news_image = $pic_name;
    //                         $image_cut = str_replace("NewsCoverTemp/", "", $news['news_image']);
    //                         $News->news_image = $image_cut;
    //                         copy($img_cover_url_temp . '/' . $image_cut, $img_cover_url_upload . '/' . $image_cut);
    //                     }
    //                     $News->save();
    //                     $news_id = $News->getKey();
    //                 }
    //             }
    //             if ($news_detail) {

    //                 foreach ($news_detail as $key => $val1) {
    //                     $NewsDetail = new NewsDetail;
    //                     foreach ($val1 as $key => $val) {
    //                         if (isset($val1['news_details_image'])) {
    //                             $image_cut2 = str_replace("NewsImageTemp/", "", $val1['news_details_image']);
    //                             $NewsDetail->news_details_image = $image_cut2;
    //                             copy($img_detail_url_temp . '/' . $image_cut2, $img_detail_url_upload . '/' . $image_cut2);
    //                         }
    //                         $NewsDetail->{$key} = $val;
    //                         $NewsDetail->news_id = $News->getKey();
    //                         $NewsDetail->save();
    //                     }
    //                 }
    //             }

    //             if ($news_category_id) {
    //                 foreach ($news_category_id as $val) {
    //                     $NewsHasNewsCategory = new NewsHasNewsCategory;
    //                     $NewsHasNewsCategory->news_category_id = $val;
    //                     $NewsHasNewsCategory->news_has_news_category_status = '1';
    //                     $NewsHasNewsCategory->news_id = $news_id;
    //                     $NewsHasNewsCategory->save();
    //                 }
    //             }
    //             if ($news_tag_id) {
    //                 foreach ($news_tag_id as $val) {
    //                     $NewsHasNewsTag = new NewsHasNewsTag;
    //                     $NewsHasNewsTag->news_tag_id = $val;
    //                     $NewsHasNewsTag->news_has_news_tag_status = '1';
    //                     $NewsHasNewsTag->news_id = $news_id;
    //                     $NewsHasNewsTag->save();
    //                 }
    //             }
    //             if ($file_name_all) {
    //                 foreach ($file_name_all as $val) {
    //                     $data_pic = explode('/', $val);
    //                     $cout_path = count($data_pic);
    //                     $pic_name =  $data_pic[$cout_path - 1];
    //                     $NewsGallery = new NewsGallery;
    //                     $NewsGallery->news_id = $News->getKey();
    //                     $NewsGallery->news_gallery_image_gall = $data_pic[$cout_path - 1];
    //                     $NewsGallery->news_gallery_type = $news_gallery_type;
    //                     $NewsGallery->news_gallery_status = 1;
    //                     $NewsGallery->save();
    //                     copy($url_temp . '/' . $pic_name, $url_upload . '/' . $pic_name);
    //                     unlink($url_temp . '/' . $pic_name);
    //                 }
    //             }
    //             if ($file_name_all_mg_detail_temp) {
    //                 foreach ($file_name_all_mg_detail_temp as $val) {
    //                     $data_pic = explode('/', $val);
    //                     $cout_path = count($data_pic);
    //                     $pic_name =  $data_pic[$cout_path - 1];
    //                     unlink($img_detail_url_temp . '/' . $pic_name);
    //                 }
    //             }
    //             if ($file_cover_temp) {
    //                 foreach ($file_cover_temp as $val) {
    //                     $data_pic = explode('/', $val);
    //                     $cout_path = count($data_pic);
    //                     $pic_name =  $data_pic[$cout_path - 1];
    //                     unlink($img_cover_url_temp . '/' . $pic_name);
    //                 }
    //             }
    //             \DB::commit();
    //             $return['status'] = 1;
    //             $return['content'] = 'Success';
    //         } catch (Exception $e) {
    //             \DB::rollBack();
    //             $return['status'] = 0;
    //             $return['content'] = 'Unsuccess';
    //         }
    //     } else {
    //         $failedRules = $validator->failed();
    //         $return['content'] = 'Unsuccess';
    //         if (isset($failedRules['news_seo_title']['required'])) {
    //             $return['status'] = 2;
    //             $return['title'] = "News is required";
    //         }
    //     }
    //     $return['title'] = 'Insert';
    //     return $return;
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url_temp = public_path('uploads/NewsImageTemp');
        $url_upload = public_path('uploads/NewsImage');
        $url_banner_temp = public_path('uploads/NewsBannerSlideTemp');
        $url_banner_upload = public_path('uploads/NewsBannerSlide');
        $url_gallery_temp = public_path('uploads/NewsGalleryTemp');
        $url_gallery_upload = public_path('uploads/NewsGallery');

        $return['news'] = News::find($id);
        $return['news']['news_public_date'] = $return['news']['news_public_date'] ? date("Y-m-d\TH:i:s", strtotime($return['news']['news_public_date'])) : '';
        $return['new_category'] = NewsHasNewsCategory::where('news_id', $return['news']['news_id'])->with('NewsCategory')->get();
        $return['news_details'] = NewsDetail::where('news_id', $return['news']['news_id'])->with('NewsBannerSlide')->get();
        $return['news_gallery'] = NewsGallery::where('news_id', $return['news']['news_id'])->orderBy('news_gallery_sort')->get();
        $new_banner_slide = NewsBannerSlide::where('news_id', $return['news']['news_id'])->get();

        if(isset($return['news']['news_og_twitter_image'])){
            copy($url_upload . '/' . $return['news']['news_og_twitter_image'], $url_temp . '/' . $return['news']['news_og_twitter_image']);
        }

        if(isset($return['news']['news_thumbnail'])){
            copy($url_upload . '/' . $return['news']['news_thumbnail'], $url_temp . '/' . $return['news']['news_thumbnail']);
        }

        if(isset($new_banner_slide)){
            foreach($new_banner_slide as $key=> $val){
                copy($url_banner_upload . '/' . $val['news_banner_slide_image'], $url_banner_temp . '/' . $val['news_banner_slide_image']);
            }
        }

        if(isset($return['news_gallery'])){
            foreach($return['news_gallery'] as $key=> $val){
                copy($url_gallery_upload . '/' . $val['news_gallery_image_gall'], $url_gallery_temp . '/' . $val['news_gallery_image_gall']);
            }
        }

        $return['status'] = 1;
        $return['title'] = 'Get News Category';
        return $return;
        // $content = News::select()->with('NewsHasNewsCategory.NewsCategory', 'NewsHasNewsTag.NewsTag', 'NewsDetail', 'NewsGallery')->find($id);
        // $content['format_news_date_set'] = $content->news_date_set ? date("Y-m-d", strtotime($content->news_date_set)) : '';
        // $content['format_news_date_end'] = $content->news_date_end ? date("Y-m-d", strtotime($content->news_date_end)) : '';
        // $content['url_path'] = asset('uploads/NewsGallery/');
        // $content['NewsPath'] = asset('uploads/NewsImage');
        // $content['NewsCoverPath'] = asset('uploads/NewsCover');

        // $return['status'] = 1;
        // $return['title'] = 'Get News';
        // $return['content'] = $content;
        // return $return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $news = $request->input('news');
        $news_detail = $request->input('news_details');
        $news_banner = $request->input('news_banner');
        $news_category_id = $request->input('news_category_id');
        $news_gallery_banner = $request->input('news_gallery');
        // $news_tag_id = $request->input('news_tag_id');

        // return $news;

        $url_temp = public_path('uploads/NewsGalleryTemp');
        $url_upload = public_path('uploads/NewsGallery');
        $img_detail_url_temp = public_path('uploads/NewsImageTemp');
        $img_detail_url_upload = public_path('uploads/NewsImage');
        $img_cover_url_temp = public_path('uploads/NewsBannerSlideTemp');
        $img_cover_url_upload = public_path('uploads/NewsBannerSlide');

        $validator = Validator::make($request->all(), [
            // 'news_seo_title' => 'required',
        ]);
        $array = array();
        // foreach ($news_detail as $key => $val) {
        // }
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if ($news) {
                    $News = News::find($id);
                    foreach ($news as $key => $val) {
                        $News->{$key} = $val;
                    }

                    if(!isset($news['news_related_news_status'])){
                        $News->news_related_news_status = 0;
                    }else{
                        if($news['news_related_news_status'] == '1' && !empty($news['news_related_news_status'])){
                            $News->news_related_news_status = 1;
                        }else{
                            $News->news_related_news_status = 0;
                        }
                    }

                    if(!isset($news['news_gallery_status'])){
                        $News->news_gallery_status = 0;
                    }else{
                        if($news['news_gallery_status'] == '1' && !empty($news['news_gallery_status'])){
                            $News->news_gallery_status = 1;
                        }else{
                            $News->news_gallery_status = 0;
                        }
                    }

                    if(!isset($news['news_status'])){
                        $News->news_status = 0;
                    }else{
                        if($news['news_status'] == '1' && !empty($news['news_status'])){
                            $News->news_status = 1;
                        }else{
                            $News->news_status = 0;
                        }
                    }

                    if(!isset($news['news_banner_status'])){
                        $News->news_banner_status = 0;
                    }else{
                        if($news['news_banner_status'] == '1' && !empty($news['news_banner_status'])){
                            $News->news_banner_status = 1;
                        }else{
                            $News->news_banner_status = 0;
                        }
                    }

                    if(isset($news['news_mata_robots'])){
                        $News->news_mata_robots = json_encode($news['news_mata_robots'], JSON_UNESCAPED_UNICODE);
                    }else{
                        $News->news_mata_robots = json_encode(array(), JSON_UNESCAPED_UNICODE);
                    }

                    if (isset($news['news_og_twitter_image'])) {
                        $image = '';
                        $image = str_replace("NewsImageTemp/", "", $news['news_og_twitter_image']);
                        $News->news_og_twitter_image = $image;
                        copy($img_detail_url_temp . '/' . $image, $img_detail_url_upload . '/' . $image);
                    }

                    if (isset($news['news_thumbnail'])) {
                        $image = '';
                        $image = str_replace("NewsImageTemp/", "", $news['news_thumbnail']);
                        $News->news_thumbnail = $image;
                        copy($img_detail_url_temp . '/' . $image, $img_detail_url_upload . '/' . $image);
                    }

                    $News->save();
                    $news_id = $id;
                }

                if ($news_detail) {

                    foreach ($news_detail as $key => $value) {
                        // return $value['news_details_id'];
                        $NewsDetail = NewsDetail::find($value['news_details_id']);

                        if(!isset($NewsDetail)){
                            $NewsDetail = new NewsDetail;
                        }

                        $NewsDetail->languages_id = $value['languages_id'];
                        $NewsDetail->news_details_content_details = $value['news_details_content_details'];
                        $NewsDetail->news_details_languages_code = $value['news_details_languages_code'];
                        $NewsDetail->news_details_short_description = $value['news_details_short_description'];
                        $NewsDetail->news_details_title = $value['news_details_title'];
                        $NewsDetail->news_id = $news_id;
                        $NewsDetail->save();
                        // foreach ($value as $k => $val) {
                        //     $NewsDetail->{$k} = $val;
                        //     $NewsDetail->news_id = $news_id;
                        //     $NewsDetail->save();
                        // }
                    }
                }

                // return $news_banner;
                if ($news_banner) {
                    $new_banner_id = array();
                    foreach($news_banner as $keys_banner=> $value_banner){
                        foreach ($value_banner as $key => $val) {
                            if(!isset($val['news_banner_slide_id'])){

                                $NewsBannerSlide = new NewsBannerSlide;

                                foreach($val as $k=> $v){
                                    $NewsBannerSlide->{$k} = $v;
                                }

                                if (isset($NewsBannerSlide->news_banner_slide_image)) {
                                    $image = '';
                                    $image = str_replace("NewsBannerSlideTemp/", "", $NewsBannerSlide->news_banner_slide_image);
                                    $NewsBannerSlide->news_banner_slide_image = $image;
                                    copy($img_cover_url_temp . '/' . $image, $img_cover_url_upload . '/' . $image);
                                }

                                $NewsBannerSlide->news_id = $news_id;
                                $NewsBannerSlide->save();
                                $new_banner_id[] = $NewsBannerSlide->getKey();
                            }else{
                                $new_banner_id[] = $val['news_banner_slide_id'];
                                $NewsBannerSlide = NewsBannerSlide::find($val['news_banner_slide_id']);

                                foreach($val as $k=> $v){
                                    $NewsBannerSlide->{$k} = $v;
                                }

                                if (isset($NewsBannerSlide->news_banner_slide_image)) {
                                    $image = '';
                                    $image = str_replace("NewsBannerSlideTemp/", "", $NewsBannerSlide->news_banner_slide_image);
                                    $NewsBannerSlide->news_banner_slide_image = $image;
                                    copy($img_cover_url_temp . '/' . $image, $img_cover_url_upload . '/' . $image);
                                }

                                $NewsBannerSlide->news_id = $news_id;
                                $NewsBannerSlide->save();
                            }
                        }
                    }
                    // return $new_banner_id;
                    NewsBannerSlide::whereNotIn('news_banner_slide_id', $new_banner_id)->where('news_id', $news_id)->delete();
                }

                if ($news_category_id) {
                    $has_category_id = array();
                    foreach ($news_category_id as $val) {
                        $NewsHasNewsCategory = NewsHasNewsCategory::where([
                            ['news_id', $news_id],
                            ['news_category_id', $val]
                            ])->first();

                            if(empty($NewsHasNewsCategory)){
                                $NewsHasNewsCategory = new NewsHasNewsCategory;
                                $NewsHasNewsCategory->news_category_id = $val;
                                $NewsHasNewsCategory->news_has_news_category_status = '1';
                                $NewsHasNewsCategory->news_id = $news_id;
                                $NewsHasNewsCategory->save();
                                $has_cat_id = $NewsHasNewsCategory->getKey();
                                $has_category_id[] = $has_cat_id;
                            }else{
                                $has_category_id[] = $NewsHasNewsCategory['news_has_news_category_id'];
                            }
                    }
                    NewsHasNewsCategory::whereNotIn('news_has_news_category_id', $has_category_id)->where('news_id', $news_id)->delete();
                }

                // return $news_gallery_banner;
                if ($news_gallery_banner) {
                    $new_gallery_id = array();
                    foreach ($news_gallery_banner as $val) {
                        if(!isset($val['news_gallery_id'])){
                            $NewsGallery = new NewsGallery;

                            foreach($val as $k=> $v){
                                $NewsGallery->{$k} = $v;
                            }

                            if (isset($NewsGallery->news_gallery_image_gall)) {
                                $image = '';
                                $image = str_replace("NewsGalleryTemp/", "", $NewsGallery->news_gallery_image_gall);
                                $NewsGallery->news_gallery_image_gall = $image;
                                copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                            }

                            $NewsGallery->news_id = $news_id;
                            $NewsGallery->save();
                            $new_gallery_id[] = $NewsGallery->getKey();
                        }else{
                            $new_gallery_id[] = $val['news_gallery_id'];
                            $NewsGallery = NewsGallery::find($val['news_gallery_id']);

                            foreach($val as $k=> $v){
                                $NewsGallery->{$k} = $v;
                            }

                            if (isset($NewsGallery->news_gallery_image_gall)) {
                                $image = '';
                                $image = str_replace("NewsGalleryTemp/", "", $NewsGallery->news_gallery_image_gall);
                                $NewsGallery->news_gallery_image_gall = $image;
                                copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                            }

                            $NewsGallery->news_id = $news_id;
                            $NewsGallery->save();
                        }
                    }
                    // return $new_gallery_id;
                    NewsGallery::whereNotIn('news_gallery_id', $new_gallery_id)->where('news_id', $news_id)->delete();
                }

                $files = glob($url_temp.'/*');
                foreach($files as $file){
                    if(is_file($file))
                        unlink($file);
                }

                $files = glob($img_cover_url_temp.'/*');
                foreach($files as $file){
                    if(is_file($file))
                        unlink($file);
                }

                $files = glob($img_detail_url_temp.'/*');
                foreach($files as $file){
                    if(is_file($file))
                        unlink($file);
                }

                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        } else {
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if (isset($failedRules['news_seo_title']['required'])) {
                $return['status'] = 2;
                $return['title'] = "News is required";
            }
        }
        $return['title'] = 'Update';
        return $return;
    }

    // public function update(Request $request, $id)
    // {
    //     return $request;
    //     $news_category_id = $request->input('news_category_id');
    //     $news_detail = $request->input('lang');
    //     $news_tag_id = $request->input('news_tag_id');
    //     $news = $request->input('news');
    //     $news_gallery_type = $request->input('news_gallery_type');

    //     $url_temp = public_path('uploads/NewsGalleryTemp');
    //     $url_upload = public_path('uploads/NewsGallery');

    //     $img_detail_url_temp = public_path('uploads/NewsImageTemp');
    //     $img_detail_url_upload = public_path('uploads/NewsImage');

    //     $img_cover_url_temp = public_path('uploads/NewsCoverTemp');
    //     $img_cover_url_upload = public_path('uploads/NewsCover');

    //     $file_name_all = $this->readDir($url_temp);
    //     $file_name_all_mg_detail_temp = $this->readDir($img_detail_url_temp);
    //     $file_cover_temp = $this->readDir($img_cover_url_temp);

    //     $pic_news_cover_name = '';
    //     $pic_news_image_name = '';
    //     $validator = Validator::make($request->all(), [
    //         // 'news_seo_title' => 'required',
    //     ]);
    //     if (!$validator->fails()) {
    //         \DB::beginTransaction();
    //         try {
    //             if ($news) {
    //                 $News = News::find($id);

    //                 if ($news_detail) {
    //                     foreach ($news as $key => $val) {
    //                         $old_image_cover = $News->news_image;
    //                         $News->{$key} = $val;
    //                         if (isset($news['news_image'])) {
    //                             // $data_pic = explode('/', $news['news_image']);
    //                             // $cout_path = count($data_pic);
    //                             // $pic_news_cover_name =  $data_pic[$cout_path - 1];
    //                             // $News->news_image = $pic_news_cover_name;

    //                             if ($old_image_cover) {
    //                                 unlink($img_cover_url_upload . '/' . $old_image_cover);
    //                             }
    //                             $image_cut = str_replace("NewsCoverTemp/", "", $news['news_image']);
    //                             $News->news_image = $image_cut;
    //                             copy($img_cover_url_temp . '/' . $image_cut, $img_cover_url_upload . '/' . $image_cut);
    //                         }
    //                         if (!isset($news['news_status'])) {
    //                             $News->news_status = 0;
    //                         }
    //                         $News->save();
    //                         $news_id = $News->getKey();
    //                     }
    //                 }
    //             }
    //             if ($news_detail) {
    //                 // $NewsDetail = NewsDetail::where('news_id', $news_id)->delete();
    //                 foreach ($news_detail as $key => $val1) {
    //                     $NewsDetail = NewsDetail::where('news_id', $news_id)->where('languages_id', $key)->first();
    //                     // $NewsDetail = new NewsDetail;
    //                     foreach ($val1 as $key => $val) {
    //                         $old_image = $NewsDetail->news_details_image;
    //                         $NewsDetail->{$key} = $val;
    //                         $NewsDetail->news_id = $news_id;

    //                         if (isset($val1['news_details_image'])) {
    //                             if ($old_image) {
    //                                 unlink($img_detail_url_upload . '/' . $old_image);
    //                             }
    //                             $image_cut2 = str_replace("NewsImageTemp/", "", $val1['news_details_image']);
    //                             $NewsDetail->news_details_image = $image_cut2;
    //                             copy($img_detail_url_temp . '/' . $image_cut2, $img_detail_url_upload . '/' . $image_cut2);
    //                         }
    //                         $NewsDetail->save();
    //                     }
    //                 }
    //             }
    //             if ($news_category_id) {
    //                 NewsHasNewsCategory::where('news_id', $news_id)->delete();
    //                 foreach ($news_category_id as $key => $val) {
    //                     $NewsHasNewsCategory = new NewsHasNewsCategory;
    //                     $NewsHasNewsCategory->news_category_id = $val;
    //                     $NewsHasNewsCategory->news_has_news_category_status = '1';
    //                     $NewsHasNewsCategory->news_id = $news_id;
    //                     $NewsHasNewsCategory->save();
    //                 }
    //             }
    //             if ($news_tag_id) {
    //                 NewsHasNewsTag::where('news_id', $news_id)->delete();
    //                 if ($news_tag_id) {
    //                     foreach ($news_tag_id as $val) {
    //                         $NewsHasNewsTag = new NewsHasNewsTag;
    //                         $NewsHasNewsTag->news_tag_id = $val;
    //                         $NewsHasNewsTag->news_has_news_tag_status = '1';
    //                         $NewsHasNewsTag->news_id = $news_id;
    //                         $NewsHasNewsTag->save();
    //                     }
    //                 }
    //             }
    //             if ($file_name_all) {
    //                 foreach ($file_name_all as $val) {
    //                     $data_pic = explode('/', $val);
    //                     $cout_path = count($data_pic);
    //                     $pic_name =  $data_pic[$cout_path - 1];
    //                     $NewsGallery = new NewsGallery;
    //                     $NewsGallery->news_id = $id;
    //                     $NewsGallery->news_gallery_image_gall = $data_pic[$cout_path - 1];
    //                     $NewsGallery->news_gallery_type = $news_gallery_type;
    //                     $NewsGallery->news_gallery_status = 1;
    //                     $NewsGallery->save();
    //                     copy($url_temp . '/' . $pic_name, $url_upload . '/' . $pic_name);
    //                     unlink($url_temp . '/' . $pic_name);
    //                 }
    //             }
    //             if ($file_name_all_mg_detail_temp) {
    //                 foreach ($file_name_all_mg_detail_temp as $val) {
    //                     $data_pic = explode('/', $val);
    //                     $cout_path = count($data_pic);
    //                     $pic_name =  $data_pic[$cout_path - 1];
    //                     unlink($img_detail_url_temp . '/' . $pic_name);
    //                 }
    //             }
    //             if ($file_cover_temp) {
    //                 foreach ($file_cover_temp as $val) {
    //                     $data_pic = explode('/', $val);
    //                     $cout_path = count($data_pic);
    //                     $pic_name =  $data_pic[$cout_path - 1];
    //                     unlink($img_cover_url_temp . '/' . $pic_name);
    //                 }
    //             }

    //             \DB::commit();
    //             $return['status'] = 1;
    //             $return['content'] = 'Success';
    //         } catch (Exception $e) {
    //             \DB::rollBack();
    //             $return['status'] = 0;
    //             $return['content'] = 'Unsuccess';
    //         }
    //     } else {
    //         $failedRules = $validator->failed();
    //         $return['content'] = 'Unsuccess';
    //         if (isset($failedRules['news_seo_title']['required'])) {
    //             $return['status'] = 2;
    //             $return['title'] = "News is required";
    //         }
    //     }
    //     $return['title'] = 'Update';
    //     return $return;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lists(Request  $request)
    {
        $result = News::select('news.*', 'news_details.news_id as news_id_details')->with('NewsHasNewsCategory.NewsCategory')->orderBy('created_at', 'DESC')
            ->join('news_details', 'news_details.news_id', 'news.news_id')
            ->join('news_has_news_category', 'news_has_news_category.news_id', 'news.news_id');

        $news_title = $request->input('news_title');
        $news_category_id = $request->input('news_category_id');
        $create_date = $request->input('create_date');
        $update_date = $request->input('update_date');
        $news_status = $request->input('news_status');

        if($news_title){
            $result->where('news_details.news_details_title', 'like', '%'.$news_title.'%');
        }

        // if($news_title){
            //     $result['NewsDetail']->where('news_details_title', 'like', '%'.$news_title.'%');
            // }

        if ($news_category_id) {
            $result->whereIn('news_has_news_category.news_category_id', $news_category_id);
        };

        if($create_date){
            $result->where('news.created_at', '>=', $create_date.' 00:00:00')->where('news.created_at', '<=', $create_date.' 23:59:59');
        }

        if($update_date){
            $result->where('news.updated_at', '>=', $update_date.' 00:00:00')->where('news.updated_at', '<=', $update_date.' 23:59:59');
        }

        if($news_status == 'all'){
            $result->whereIn('news.news_status', [0, 1]);
        }else if($news_status == '1'){
            $result->where('news.news_status', 1);
        }else if($news_status == '0'){
            $result->where('news.news_status', 0);
        }

        $result->groupBy('news_id_details');

        // return $result->get();

        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" name="select-news" id="checkbox-item-' . $res->news_id . '" value="'.$res->news_id .'">
                        <label class="custom-control-label" for="checkbox-item-' . $res->news_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('news_thumbnail', function ($res) {

                $html = '<img id="preview_img_cover_add" style="height:20%;" src="'.asset($res->viewImage()).'">';
                return $html;
            })
            ->addColumn('news_title', function ($res) {
                $html = '';
                if(isset($res->NewsDetail[0])){
                    $html = '<label class="control-label col-form-label">'.$res->NewsDetail[0]['news_details_title'] .'</label>';
                }
                return $html;
            })
            ->addColumn('news_tag_category', function ($res) {
                $html = '';
                if($res->NewsHasNewsCategory){
                    foreach ($res->NewsHasNewsCategory as $val) {
                        if ($val->news_category_id) {
                            $html .= '<span class="badge badge-pill badge-info text-white">' . $val->newsCategory['news_category_mata_title'] . '</span></br>';
                        }
                    }
                }
                return $html;
            })
            ->addColumn('view', function ($res) {
                $html = '';
                return $html;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('News', '1');
                $insert = Helper::CheckPermissionMenu('News', '2');
                $update = Helper::CheckPermissionMenu('News', '3');
                $delete = Helper::CheckPermissionMenu('News', '4');
                if ($res->news_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->news_id . '" data-style="ios" data-on="On" data-off="Off">';
                $btnView = '<button type="button" class="btn btn-info btn-md btn-view" data-id="' . $res->news_id . '">View</button>';
                $btnEdit = '<button type="button" class="btn btn-warning btn-md btn-edit" data-id="' . $res->news_id . '">Edit</button>';
                $btnDelete = '<button type="button" class="btn btn-danger btn-md btn-delete" data-id="' . $res->news_id . '">Delete</button>';
                $str = '';
                if ($update) {
                    $str .= ' ' . $btnStatus;
                }
                if ($view) {
                    $str .= ' ' . $btnView;
                }
                if ($update) {
                    $str .= ' ' . $btnEdit;
                }
                if ($delete) {
                    $str .= ' ' . $btnDelete;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['sewn', 'checkbox', 'news_thumbnail', 'news_title', 'news_tag_category', 'view','action'])
            ->make(true);

    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            if($id != 'null'){
                if($id == 'multi'){
                    foreach($request->input('id') as $val){
                        $News = News::find($val);
                        if($News->news_status == 1){
                            $News->news_status = 0;
                        }else{
                            $News->news_status = 1;
                        }
                        $News->save();
                    }
                }else{
                    $News = News::find($id);
                    $News->news_status = $request->input('status');
                    $News->save();
                }
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            }else{
                $return['status'] = 2;
                $return['content'] = 'Unsuccess Plese select';
            }
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Update Status';
        return $return;
    }


    public function Delete(Request $request, $id)
    {
        // $status = $request->input('status');
        \DB::beginTransaction();
        try {
            if($id != 'null'){
                if($id == 'multi'){
                    foreach($request->input('id') as $val){
                        News::where('news_id', $val)->delete();
                        NewsDetail::where('news_id', $val)->delete();
                        NewsBannerSlide::where('news_id', $val)->delete();
                        NewsGallery::where('news_id', $val)->delete();
                        NewsHasNewsCategory::where('news_id', $val)->delete();
                    }
                }else{
                    News::where('news_id', $id)->delete();
                    NewsDetail::where('news_id', $id)->delete();
                    NewsBannerSlide::where('news_id', $id)->delete();
                    NewsGallery::where('news_id', $id)->delete();
                    NewsHasNewsCategory::where('news_id', $id)->delete();

                }
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            }else{
                $return['status'] = 2;
                $return['content'] = 'Unsuccess Plese select';
            }
        } catch (Exception $e) {
            \DB::rollBack();
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Delete Status';
        return $return;
    }

    public function readDir($dir)
    {
        $dirs = array($dir);
        $files = array();
        for ($i = 0;; $i++) {
            if (isset($dirs[$i]))
                $dir =  $dirs[$i];
            else
                break;

            if ($openDir = @opendir($dir)) {
                while ($readDir = @readdir($openDir)) {
                    if ($readDir != "." && $readDir != "..") {

                        if (is_dir($dir . "/" . $readDir)) {
                            $dirs[] = $dir . "/" . $readDir;
                        } else {
                            $files[] = $dir . "/" . $readDir;
                        }
                    }
                }
            }
        }

        return $files;
    }
}

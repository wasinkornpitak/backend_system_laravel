<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\NewsCategory;
use App\NewsCategoryDetail;
use App\Language;
use App\NewsCategoryBannerSlide;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'NewsCategory')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Language'] = Language::where('languages_status', '1')->get();
        $data['NewsCategory'] = NewsCategory::get();
        $data['SeoTypes'] = [
            "0" => "ใช้ SEO หลัก",
            "1" => "ใช้ SEO ตามภาษา"
        ];
        if (Helper::CheckPermissionMenu('NewsCategory', '1')) {
            return view('admin.NewsCategory.news_category', $data);
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
        $input_all = $request->all();
        $url_temp = public_path('uploads/NewsCategoryImageTemp');
        $url_upload = public_path('uploads/NewsCategoryImage');
        $url_banner_temp = public_path('uploads/NewsCategoryBannerSlideTemp');
        $url_banner_upload = public_path('uploads/NewsCategoryBannerSlide');

        $validator = Validator::make($request->all(), [
            // 'news_category_seo_title' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if ($input_all['news_category']) {
                    $NewsCategory = new NewsCategory;
                    foreach($input_all['news_category'] as $keys=> $value){
                        $NewsCategory->{$keys} = $value;

                        unset($NewsCategory->news_banner_slide_alt);
                        unset($NewsCategory->news_banner_slide_url_slug);

                        if(!isset($input_all['news_category']['news_category_status'])){
                            $NewsCategory->news_category_status = 0;
                        }else{
                            if($input_all['news_category']['news_category_status'] == 'on' && !empty($input_all['news_category']['news_category_status'])){
                                $NewsCategory->news_category_status = 1;
                            }else{
                                $NewsCategory->news_category_status = 0;
                            }
                        }

                        if(!isset($input_all['news_category']['news_category_banner_status'])){
                            $NewsCategory->news_category_banner_status = 0;
                        }else{
                            if($NewsCategory->news_category_banner_status == 'on' && !empty($input_all['news_category']['news_category_banner_status'])){
                                $NewsCategory->news_category_banner_status = 1;
                            }else{
                                $NewsCategory->news_category_banner_status = 0;
                            }
                        }

                        if(isset($input_all['news_category']['news_category_mata_robots'])){
                            $NewsCategory->news_category_mata_robots = json_encode($input_all['news_category']['news_category_mata_robots'], JSON_UNESCAPED_UNICODE);
                        }else{
                            $NewsCategory->news_category_mata_robots = json_encode(array(), JSON_UNESCAPED_UNICODE);
                        }

                        if (isset($input_all['news_category']['news_category_og_twitter_image'])) {
                            $image = '';
                            $image = str_replace("NewsCategoryImageTemp/", "", $input_all['news_category']['news_category_og_twitter_image']);
                            $NewsCategory->news_category_og_twitter_image = $image;
                            copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                        }

                        if (isset($input_all['news_category']['news_category_thumnail_image'])) {
                            $image = '';
                            $image = str_replace("NewsCategoryImageTemp/", "", $input_all['news_category']['news_category_thumnail_image']);
                            $NewsCategory->news_category_thumnail_image = $image;
                            copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                        }

                        $NewsCategory->save();
                        $news_category_id = $NewsCategory->getKey();
                    }
                }

                if (isset($input_all['news_category_details'])) {
                    foreach($input_all['news_category_details'] as $keys_details=> $value_details){
                        $NewsCategoryDetail = new NewsCategoryDetail;

                        foreach($value_details as $key=> $val){
                            $NewsCategoryDetail->{$key} = $val;
                        }

                        if(!isset($NewsCategoryDetail->news_category_details_status)){
                            $NewsCategoryDetail->news_category_details_status = 0;
                        }else{
                            if($NewsCategoryDetail->news_category_details_status == 'on' && !empty($NewsCategoryDetail->news_category_details_status)){
                                $NewsCategoryDetail->news_category_details_status = 1;
                            }else{
                                $NewsCategoryDetail->news_category_details_status = 0;
                            }
                        }

                        $NewsCategoryDetail->news_category_id = $news_category_id;
                        $NewsCategoryDetail->save();

                    }
                }

                if (isset($input_all['news_category_banner'])) {
                    foreach($input_all['news_category_banner'] as $keys_banner=> $value_banner){
                        foreach ($value_banner as $key => $val) {
                            $NewsCategoryBannerSlide = new NewsCategoryBannerSlide;

                            foreach($val as $k=> $v){
                                $NewsCategoryBannerSlide->{$k} = $v;
                            }

                            if (isset($NewsCategoryBannerSlide->news_category_banner_slide_image)) {
                                $image = '';
                                $image = str_replace("NewsCategoryBannerSlideTemp/", "", $NewsCategoryBannerSlide->news_category_banner_slide_image);
                                $NewsCategoryBannerSlide->news_category_banner_slide_image = $image;
                                copy($url_banner_temp . '/' . $image, $url_banner_upload . '/' . $image);
                            }

                            $NewsCategoryBannerSlide->news_category_id = $news_category_id;
                            $NewsCategoryBannerSlide->save();
                        }
                    }
                }

                $files = glob($url_temp.'/*');
                foreach($files as $file){
                    if(is_file($file))
                        unlink($file);
                }

                $files = glob($url_banner_temp.'/*');
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
            if (isset($failedRules['news_category_seo_title']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Event is required";
            }
        }
        $return['title'] = 'Insert';
        return $return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url_temp = public_path('uploads/NewsCategoryImageTemp');
        $url_upload = public_path('uploads/NewsCategoryImage');
        $url_banner_temp = public_path('uploads/NewsCategoryBannerSlideTemp');
        $url_banner_upload = public_path('uploads/NewsCategoryBannerSlide');

        $return['new_category'] = NewsCategory::find($id);
        $return['new_category_details'] = NewsCategoryDetail::where('news_category_id', $return['new_category']['news_category_id'])->with('NewsCategoryBannerSlide')->get();
        $new_category_details = NewsCategoryBannerSlide::where('news_category_id', $return['new_category']['news_category_id'])->get();

        if(isset($return['new_category']['news_category_og_twitter_image'])){
            copy($url_upload . '/' . $return['new_category']['news_category_og_twitter_image'], $url_temp . '/' . $return['new_category']['news_category_og_twitter_image']);
        }

        if(isset($return['new_category']['news_category_thumnail_image'])){
            copy($url_upload . '/' . $return['new_category']['news_category_thumnail_image'], $url_temp . '/' . $return['new_category']['news_category_thumnail_image']);
        }

        if(isset($new_category_details)){
            foreach($new_category_details as $key=> $val){
                copy($url_banner_upload . '/' . $val['news_category_banner_slide_image'], $url_banner_temp . '/' . $val['news_category_banner_slide_image']);
            }
        }

        $return['status'] = 1;
        $return['title'] = 'Get News Category';
        return $return;
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
        $input_all = $request->all();
        $url_temp = public_path('uploads/NewsCategoryImageTemp');
        $url_upload = public_path('uploads/NewsCategoryImage');
        $url_banner_temp = public_path('uploads/NewsCategoryBannerSlideTemp');
        $url_banner_upload = public_path('uploads/NewsCategoryBannerSlide');

        $validator = Validator::make($request->all(), [
            // 'news_category_seo_title' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                if ($input_all['news_category']) {
                    $NewsCategory = NewsCategory::find($id);

                    foreach($input_all['news_category'] as $keys=> $value){
                        $NewsCategory->{$keys} = $value;

                        unset($NewsCategory->news_banner_slide_alt);
                        unset($NewsCategory->news_banner_slide_url_slug);

                        if(!isset($input_all['news_category']['news_category_status'])){
                            $NewsCategory->news_category_status = 0;
                        }else{
                            if($input_all['news_category']['news_category_status'] == 1 && !empty($input_all['news_category']['news_category_status'])){
                                $NewsCategory->news_category_status = 1;
                            }else{
                                $NewsCategory->news_category_status = 0;
                            }
                        }

                        if(!isset($input_all['news_category']['news_category_banner_status'])){
                            $NewsCategory->news_category_banner_status = 0;
                        }else{
                            if($NewsCategory->news_category_banner_status == 1 && !empty($input_all['news_category']['news_category_banner_status'])){
                                $NewsCategory->news_category_banner_status = 1;
                            }else{
                                $NewsCategory->news_category_banner_status = 0;
                            }
                        }

                        if(isset($input_all['news_category']['news_category_mata_robots'])){
                            $NewsCategory->news_category_mata_robots = json_encode($input_all['news_category']['news_category_mata_robots'], JSON_UNESCAPED_UNICODE);
                        }else{
                            $NewsCategory->news_category_mata_robots = json_encode(array(), JSON_UNESCAPED_UNICODE);
                        }

                        if (isset($input_all['news_category']['news_category_og_twitter_image'])) {
                            $image = '';
                            $image = str_replace("NewsCategoryImageTemp/", "", $input_all['news_category']['news_category_og_twitter_image']);
                            $NewsCategory->news_category_og_twitter_image = $image;
                            copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                        }

                        if (isset($input_all['news_category']['news_category_thumnail_image'])) {
                            $image = '';
                            $image = str_replace("NewsCategoryImageTemp/", "", $input_all['news_category']['news_category_thumnail_image']);
                            $NewsCategory->news_category_thumnail_image = $image;
                            copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                        }

                        $NewsCategory->save();
                        $news_category_id = $NewsCategory->getKey();
                    }
                }

                if (isset($input_all['news_category_details'])) {
                    foreach($input_all['news_category_details'] as $keys_details=> $value_details){
                        $NewsCategoryDetail = NewsCategoryDetail::find($value_details['news_category_details_id']);

                        if(!isset($NewsCategoryDetail)){
                            $NewsCategoryDetail = new NewsCategoryDetail;
                        }

                        foreach($value_details as $key=> $val){
                            $NewsCategoryDetail->{$key} = $val;
                        }

                        if(!isset($NewsCategoryDetail->news_category_details_status)){
                            $NewsCategoryDetail->news_category_details_status = 0;
                        }else{
                            if($NewsCategoryDetail->news_category_details_status == 1 && !empty($NewsCategoryDetail->news_category_details_status)){
                                $NewsCategoryDetail->news_category_details_status = 1;
                            }else{
                                $NewsCategoryDetail->news_category_details_status = 0;
                            }
                        }

                        $NewsCategoryDetail->news_category_id = $news_category_id;
                        $NewsCategoryDetail->save();

                    }
                }

                if (isset($input_all['news_category_banner'])) {
                    $new_banner_id = array();
                    foreach($input_all['news_category_banner'] as $keys_banner=> $value_banner){
                        foreach ($value_banner as $key => $val) {
                            if(!isset($val['news_category_banner_slide_id'])){
                                $NewsCategoryBannerSlide = new NewsCategoryBannerSlide;

                                foreach($val as $k=> $v){
                                    $NewsCategoryBannerSlide->{$k} = $v;
                                }

                                if (isset($NewsCategoryBannerSlide->news_category_banner_slide_image)) {
                                    $image = '';
                                    $image = str_replace("NewsCategoryBannerSlideTemp/", "", $NewsCategoryBannerSlide->news_category_banner_slide_image);
                                    $NewsCategoryBannerSlide->news_category_banner_slide_image = $image;
                                    copy($url_banner_temp . '/' . $image, $url_banner_upload . '/' . $image);
                                }

                                $NewsCategoryBannerSlide->news_category_id = $news_category_id;
                                $NewsCategoryBannerSlide->save();
                                $new_banner_id[] = $NewsCategoryBannerSlide->getKey();
                            }else{
                                $new_banner_id[] = $val['news_category_banner_slide_id'];
                                $NewsCategoryBannerSlide = NewsCategoryBannerSlide::find($val['news_category_banner_slide_id']);

                                foreach($val as $k=> $v){
                                    $NewsCategoryBannerSlide->{$k} = $v;
                                }

                                if (isset($NewsCategoryBannerSlide->news_category_banner_slide_image)) {
                                    $image = '';
                                    $image = str_replace("NewsCategoryBannerSlideTemp/", "", $NewsCategoryBannerSlide->news_category_banner_slide_image);
                                    $NewsCategoryBannerSlide->news_category_banner_slide_image = $image;
                                    copy($url_banner_temp . '/' . $image, $url_banner_upload . '/' . $image);
                                }

                                $NewsCategoryBannerSlide->news_category_id = $news_category_id;
                                $NewsCategoryBannerSlide->save();
                            }
                        }
                    }
                    NewsCategoryBannerSlide::whereNotIn('news_category_banner_slide_id', $new_banner_id)->where('news_category_id', $id)->delete();
                }

                $files = glob($url_temp.'/*');
                foreach($files as $file){
                    if(is_file($file))
                        unlink($file);
                }

                $files = glob($url_banner_temp.'/*');
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
            if (isset($failedRules['news_category_seo_title']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Event is required";
            }
        }
        $return['title'] = 'Update';
        return $return;
    }

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
        $result = NewsCategory::with('NewsCategoryDetail.Language')->orderBy('created_at', 'DESC');

        $news_category_id = $request->input('news_category_id');
        $news_status = $request->input('news_status');

        if ($news_category_id) {
            $result->whereIn('news_category_id', $news_category_id);
        };

        if($news_status == 'all'){
            $result->whereIn('news_category_status', [0, 1]);
        }else if($news_status == '1'){
            $result->where('news_category_status', 1);
        }else if($news_status == '0'){
            $result->where('news_category_status', 0);
        }

        // if ($news_category_seo_keyword) {
        //     $result->where('news_category_seo_keyword', 'like', '%' . $news_category_seo_keyword . '%');
        // };
        // if ($news_category_seo_description) {
        //     $result->where('news_category_seo_description', 'like', '%' . $news_category_seo_description . '%');
        // };
        // if ($news_category_url_slug) {
        //     $result->where('news_category_url_slug', 'like', '%' . $news_category_url_slug . '%');
        // };

        return Datatables::of($result)
            ->addColumn('checkbox', function ($res) {
                $str = '<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input checkbox-table" name="select-news" id="checkbox-item-' . $res->news_category_id . '" value="'.$res->news_category_id .'">
                        <label class="custom-control-label" for="checkbox-item-' . $res->news_category_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('news_category_name', function ($res) {
                $str = '';
                if(isset($res->NewsCategoryDetail)){
                    foreach($res->NewsCategoryDetail as $val){
                        $str .= '<label class="col-sm-9 control-label col-form-label"><i class="'.$val['language']['languages_icon'].'"></i> '.$val['news_category_details_name'] .'</label>';
                    }
                }

                return $str;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('News', '1');
                $insert = Helper::CheckPermissionMenu('News', '2');
                $update = Helper::CheckPermissionMenu('News', '3');
                $delete = Helper::CheckPermissionMenu('News', '4');
                if ($res->news_category_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->news_category_id . '" data-style="ios" data-on="On" data-off="Off">';
                $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->news_category_id . '">View</button>';
                $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->news_category_id . '">Edit</button>';

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
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'action', 'news_category_name'])
            ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            if($id != 'null'){
                if($id == 'multi'){
                    foreach($request->input('id') as $val){
                        $NewsCategory = NewsCategory::find($val);
                        if($NewsCategory->news_category_status == 1){
                            $NewsCategory->news_category_status = 0;
                        }else{
                            $NewsCategory->news_category_status = 1;
                        }
                        $NewsCategory->save();
                    }
                }else{
                    $NewsCategory = NewsCategory::find($id);
                    $NewsCategory->news_category_status = $request->input('status');
                    $NewsCategory->save();
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
                        NewsCategory::where('news_category_id', $val)->delete();
                        NewsCategoryDetail::where('news_category_id', $val)->delete();
                        NewsCategoryBannerSlide::where('news_category_id', $val)->delete();
                    }
                }else{
                    NewsCategory::where('news_category_id', $id)->delete();
                    NewsCategoryDetail::where('news_category_id', $id)->delete();
                    NewsCategoryBannerSlide::where('news_category_id', $id)->delete();
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

}

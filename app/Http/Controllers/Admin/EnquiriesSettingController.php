<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\Logo;
use App\EnquiriesSetting;
use App\EnquiryFields;
use App\Language;

class EnquiriesSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'EnquiriesSetting')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        $data['Setting'] = EnquiriesSetting::first();
        $data['Field'] = EnquiryFields::select()->orderBy('enquiry_fields_order_by')->get();
        $data['Field'] = (isset($data['Field'])) ? $data['Field'] : array();
        $data['count_field'] = count($data['Field']);
        $data['arr_field_type'] = array(
                                    1=> 'Text Input',
                                    2=> 'Text Area Input',
                                    3=> 'E-mail Input',
                                    4=> 'Numeric Input',
                                );
        // return $data;
        // $data['QuestionCategory'] = QuestionCategory::where('ques_category_status', '1')->get();
        // $data['Language'] = Language::where('languages_status', '1')->get();

        if (Helper::CheckPermissionMenu('EnquiriesSetting', '1')) {
            return view('admin.EnquiriesSetting.enquiries_setting', $data);
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
        $url_temp = public_path('uploads/EnquiriesImageTemp');
        $url_upload = public_path('uploads/EnquiriesImage');
        // $file_name_all = $this->readDir($url_temp);

        $validator = Validator::make($request->all(), [
            // 'logo_title' => 'required',
            // 'logo_image' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {

                $count = EnquiriesSetting::select()->get();
                // return count($count);
                if(count($count) > 0){
                    $EnquiriesSetting = EnquiriesSetting::select()->first();
                }else{
                    $EnquiriesSetting = new EnquiriesSetting;
                }

                foreach ($input_all as $key => $val) {
                    $EnquiriesSetting->{$key} = $val;

                    if (isset($input_all['enquiry_setting_map_image'])) {
                        $image = '';
                        $image = str_replace("EnquiriesImageTemp/", "", $input_all['enquiry_setting_map_image']);
                        $EnquiriesSetting->enquiry_setting_map_image = $image;
                        copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                    }

                    if (isset($input_all['enquiry_setting_image'])) {
                        $image = '';
                        $image = str_replace("EnquiriesImageTemp/", "", $input_all['enquiry_setting_image']);
                        $EnquiriesSetting->enquiry_setting_image = $image;
                        copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                    }

                    if(!isset($input_all['enquiry_setting_status'])){
                        $EnquiriesSetting->enquiry_setting_status = 0;
                    }else{
                        if($input_all['enquiry_setting_status'] == 'on' && !empty($input_all['enquiry_setting_status'])){
                            $EnquiriesSetting->enquiry_setting_status = 1;
                        }else{
                            $EnquiriesSetting->enquiry_setting_status = 0;
                        }
                    }

                }

                $EnquiriesSetting->save();

                $files = glob($url_temp.'/*');
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
            if (isset($failedRules['logo_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Logo is required";
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
        $content = Logo::find($id);
        $content['LogoImagePath'] = asset('uploads/LogoImage');

        $return['status'] = 1;
        $return['title'] = 'Get Logo';
        $return['content'] = $content;
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
        $input_all = $request->all();
        $url_temp = public_path('uploads/EnquiriesImageTemp');
        $url_upload = public_path('uploads/EnquiriesImage');
        $file_name_all = $this->readDir($url_temp);


        $validator = Validator::make($request->all(), [
            // 'logo_title' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                // $Logo = Logo::find($id);
                // foreach ($input_all as $key => $val) {
                //     $old_image = $Logo->logo_image;
                //     $Logo->{$key} = $val;
                //     if (isset($input_all['logo_image'])) {
                //         if($old_image){
                //             unlink($url_upload . '/' . $old_image);
                //         }
                //         $image_cut = str_replace("LogoImageTemp/", "", $input_all['logo_image']);
                //         $Logo->logo_image = $image_cut;
                //         copy($url_temp . '/' . $image_cut, $url_upload . '/' . $image_cut);

                //     }
                // }
                // if (!isset($input_all['logo_status'])) {
                //     $Logo->logo_status = 0;
                // }
                // // if (isset($input_all['logo_image'])) {
                // //     $Logo->logo_image = str_replace("LogoImage/", "", $input_all['logo_image']);
                // // }
                // $Logo->save();

                // if ($file_name_all) {
                //     foreach ($file_name_all as $val) {
                //         $data_pic = explode('/', $val);
                //         $cout_path = count($data_pic);
                //         $pic_name =  $data_pic[$cout_path - 1];

                //         // copy($url_temp . '/' . $pic_name, $url_upload . '/' . $pic_name);
                //         unlink($url_temp . '/' . $pic_name);
                //     }
                // }

                $EnquiriesSetting = EnquiriesSetting::find($id);
                foreach ($input_all as $key => $val) {
                    $EnquiriesSetting->{$key} = $val;

                    if(isset($input_all['enquiry_setting_meta_index'])){
                        $EnquiriesSetting->enquiry_setting_meta_index = $input_all['enquiry_setting_meta_index'];
                    }else{
                        $EnquiriesSetting->enquiry_setting_meta_index = 0;
                    }

                    if(isset($input_all['enquiry_setting_meta_follow'])){
                        $EnquiriesSetting->enquiry_setting_meta_follow = $input_all['enquiry_setting_meta_follow'];
                    }else{
                        $EnquiriesSetting->enquiry_setting_meta_follow = 0;
                    }

                    if(isset($input_all['enquiry_setting_meta_noodp'])){
                        $EnquiriesSetting->enquiry_setting_meta_noodp = $input_all['enquiry_setting_meta_noodp'];
                    }else{
                        $EnquiriesSetting->enquiry_setting_meta_noodp = 0;
                    }

                    if(isset($input_all['enquiry_setting_meta_noydir'])){
                        $EnquiriesSetting->enquiry_setting_meta_noydir = $input_all['enquiry_setting_meta_noydir'];
                    }else{
                        $EnquiriesSetting->enquiry_setting_meta_noydir = 0;
                    }


                    if (isset($input_all['enquiry_setting_map_image'])) {
                        $image = '';
                        $image = str_replace("EnquiriesImageTemp/", "", $input_all['enquiry_setting_map_image']);
                        $EnquiriesSetting->enquiry_setting_map_image = $image;
                        copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                        // unlink($url_temp . '/' . $image);
                    }

                    if (isset($input_all['enquiry_setting_image'])) {
                        $image = '';
                        $image = str_replace("EnquiriesImageTemp/", "", $input_all['enquiry_setting_image']);
                        $EnquiriesSetting->enquiry_setting_image = $image;
                        copy($url_temp . '/' . $image, $url_upload . '/' . $image);
                        // unlink($url_temp . '/' . $image);
                    }

                    if(!isset($input_all['enquiry_setting_status'])){
                        $EnquiriesSetting->enquiry_setting_status = 0;
                    }else{
                        if($input_all['enquiry_setting_status'] == 'on' && !empty($input_all['enquiry_setting_status'])){
                            $EnquiriesSetting->enquiry_setting_status = 1;
                        }else{
                            $EnquiriesSetting->enquiry_setting_status = 0;
                        }
                    }

                }

                $EnquiriesSetting->save();

                // $files = glob($url_temp.'/*');
                // foreach($files as $file){
                //     if(is_file($file))
                //         unlink($file);
                // }

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
            if (isset($failedRules['logo_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Logo is required";
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

    }

    public function ChangeStatus(Request $request, $id)
    {
        $status = $request->input('status');
        \DB::beginTransaction();
        try {
            $input_all['logo_status'] = $status;
            $input_all['updated_at'] = date('Y-m-d H:i:s');
            Logo::where('logo_id', $id)->update($input_all);
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Success';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Update Status';
        return $return;
    }

    public function GetLogo(Request  $request)
    {
        $content = Logo::select()->get();
        $return['LogoImagePath'] = asset('uploads/LogoImage');
        $return['status'] = 1;
        $return['title'] = 'Get Logo Us';
        $return['content'] = $content;
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

    public function AddFieldInput(Request  $request)
    {
        // return $request;
        $input_all = $request->all();

        $validator = Validator::make($request->all(), [
            // 'logo_title' => 'required',
            // 'logo_image' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {

                $enquiry_fields_id_arr = array();
                foreach ($input_all['field'] as $keys => $value) {

                    if(!isset($value['enquiry_fields_id'])){
                        $EnquiryFields = new EnquiryFields;

                    }else{
                        $EnquiryFields = EnquiryFields::find($value['enquiry_fields_id']);

                    }

                    foreach($value as $key => $val){
                        $EnquiryFields->{$key} = $val;
                    }

                    if (isset($value['enquiry_fields_required'])) {
                        $EnquiryFields->enquiry_fields_required = $value['enquiry_fields_required'];
                    }else{
                        $EnquiryFields->enquiry_fields_required = 0;
                    }

                    if (isset($value['enquiry_fields_status'])) {
                        $EnquiryFields->enquiry_fields_status = $value['enquiry_fields_status'];
                    }else{
                        $EnquiryFields->enquiry_fields_status = 0;
                    }
                    $EnquiryFields->save();
                    $enquiry_fields_id_arr[] = $EnquiryFields->getKey();
                }

                EnquiryFields::whereNotIn('enquiry_fields_id', $enquiry_fields_id_arr)->delete();

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
            if (isset($failedRules['logo_name']['required'])) {
                $return['status'] = 2;
                $return['title'] = "is required";
            }
        }
        $return['title'] = 'Insert';
        return $return;

    }
}

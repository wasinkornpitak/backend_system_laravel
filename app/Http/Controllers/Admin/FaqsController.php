<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\Logo;
use App\Faqs;
use App\FaqsDetail;
use App\Language;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'Faqs')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        // $data['QuestionCategory'] = QuestionCategory::where('ques_category_status', '1')->get();
        $data['Language'] = Language::where('languages_status', '1')->get();
        // return $data;
        if (Helper::CheckPermissionMenu('Faqs', '1')) {
            return view('admin.Faqs.faqs', $data);
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
        $url_temp = public_path('uploads/LogoImageTemp');
        $url_upload = public_path('uploads/LogoImage');
        $file_name_all = $this->readDir($url_temp);

        $validator = Validator::make($request->all(), [
            // 'logo_title' => 'required',
            // 'logo_image' => 'required',
        ]);

        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $Faqs = new Faqs;
                if(!isset($input_all['faqs']['ques_status'])){
                    $Faqs->ques_status = 0;
                }else{
                    if($input_all['faqs']['ques_status'] == 1 && !empty($input_all['faqs']['ques_status'])){
                        $Faqs->ques_status = 1;
                    }else{
                        $Faqs->ques_status = 0;
                    }
                }

                $Faqs->save();
                $faqs_id = $Faqs->getKey();

                foreach ($input_all['faqs_details'] as $keys => $value) {
                    $FaqsDetail = new FaqsDetail;
                    foreach($value as $key => $val){
                        $FaqsDetail->{$key} = $val;
                    }

                    // if(!isset($value['ques_lang_status'])){
                    //     $FaqsDetail->ques_lang_status = 0;
                    // }else{
                    //     if($value['ques_lang_status'] ==  && !empty($value['ques_lang_status'])){
                    //         $FaqsDetail->ques_lang_status = 1;
                    //     }else{
                        //         $FaqsDetail->ques_lang_status = 0;
                        //     }
                        // }
                    $FaqsDetail->ques_lang_status = 1;
                    $FaqsDetail->ques_id = $faqs_id;
                    $FaqsDetail->save();
                }


                // if ($file_name_all) {
                //     foreach ($file_name_all as $val) {
                //         $data_pic = explode('/', $val);
                //         $cout_path = count($data_pic);
                //         $pic_name =  $data_pic[$cout_path - 1];

                //         // copy($url_temp . '/' . $pic_name, $url_upload . '/' . $pic_name);
                //         unlink($url_temp . '/' . $pic_name);
                //     }
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
        $return['faqs_detail'] = FaqsDetail::where('ques_id', $id)->get();
        $return['faqs'] = Faqs::find($id);
        // $content['LogoImagePath'] = asset('uploads/LogoImage');

        $return['status'] = 1;
        $return['title'] = 'Get Logo';
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
        // return $input_all;
        $url_temp = public_path('uploads/LogoImageTemp');
        $url_upload = public_path('uploads/LogoImage');
        $file_name_all = $this->readDir($url_temp);


        $validator = Validator::make($request->all(), [
            // 'logo_title' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $Faqs = Faqs::find($id);
                if(!isset($input_all['faqs']['ques_status'])){
                    $Faqs->ques_status = 0;
                }else{
                    if($input_all['faqs']['ques_status'] == 1 && !empty($input_all['faqs']['ques_status'])){
                        $Faqs->ques_status = 1;
                    }else{
                        $Faqs->ques_status = 0;
                    }
                }

                $Faqs->save();
                $faqs_id = $id;

                foreach ($input_all['faqs_details'] as $keys => $value) {
                    $FaqsDetail = FaqsDetail::find($value['ques_lang_id']);
                    foreach($value as $key => $val){
                        $FaqsDetail->{$key} = $val;
                    }

                    // if(!isset($value['ques_lang_status'])){
                    //     $FaqsDetail->ques_lang_status = 0;
                    // }else{
                    //     if($value['ques_lang_status'] ==  && !empty($value['ques_lang_status'])){
                    //         $FaqsDetail->ques_lang_status = 1;
                    //     }else{
                        //         $FaqsDetail->ques_lang_status = 0;
                        //     }
                        // }
                    $FaqsDetail->ques_lang_status = 1;
                    $FaqsDetail->ques_id = $faqs_id;
                    $FaqsDetail->save();
                }

                // // $Faqs = Faqs::find($id);
                // // $Faqs->save();
                // // $faqs_id = $id;

                // foreach ($input_all['faqs_details'] as $keys => $value) {
                //     $FaqsDetail = FaqsDetail::find($value['ques_lang_id']);
                //     foreach($value as $key => $val){
                //         $FaqsDetail->{$key} = $val;
                //     }

                //     if(!isset($value['ques_lang_status'])){
                //         $FaqsDetail->ques_lang_status = 0;
                //     }else{
                //         if($value['ques_lang_status'] == '1' && !empty($value['ques_lang_status'])){
                //             $FaqsDetail->ques_lang_status = 1;
                //         }else{
                //             $FaqsDetail->ques_lang_status = 0;
                //         }
                //     }

                //     $FaqsDetail->ques_id = $id;
                //     $FaqsDetail->save();
                // }
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
        $result = Faqs::select('ques.*', 'ques_lang.ques_id as ques_id_details')
                        ->join('ques_lang', 'ques_lang.ques_id', 'ques.ques_id')
                        ->orderBy('created_at', 'DESC');
        // $result = Faqs::with('FaqsDetail.Language')
        //                 ->join('ques_lang', 'ques_lang.ques_id', 'ques.ques_id')
        //                 ->orderBy('created_at', 'DESC');
        // return $result->get();

        $faqs_question = $request->input('faqs_question');
        $faqs_create_date = $request->input('faqs_create_date');
        $faqs_update_date = $request->input('faqs_update_date');
        $faqs_status = $request->input('faqs_status');

        if($faqs_question){
            $result->where('ques_lang_question', 'like', '%'.$faqs_question.'%');
        }

        if($faqs_create_date){
            $result->where('created_at', '>=', $faqs_create_date.' 00:00:00')->where('created_at', '<=', $faqs_create_date.' 23:59:59');
        }

        if($faqs_update_date){
            $result->where('updated_at', '>=', $faqs_update_date.' 00:00:00')->where('updated_at', '<=', $faqs_update_date.' 23:59:59');
        }

        if($faqs_status == 'all'){
            $result->whereIn('ques_status', [0, 1]);
        }else if($faqs_status == '1'){
            $result->where('ques_status', 1);
        }else if($faqs_status == '0'){
            $result->where('ques_status', 0);
        }

        $result->groupBy('ques_id_details');

        // $result->groupBy('news_id_details');

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
                        <input type="checkbox" class="custom-control-input checkbox-table" name="select-news" id="checkbox-item-' . $res->ques_id . '" value="'.$res->ques_id .'">
                        <label class="custom-control-label" for="checkbox-item-' . $res->ques_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('faqs_title', function ($res) {
                $str = '';
                if(isset($res->FaqsDetail)){
                    foreach($res->FaqsDetail as $keys=> $value){
                        if($value['Language']['languages_type'] == 1){
                            $str = $value['ques_lang_question'];
                        }
                    }
                }

                return $str;
            })
            ->addColumn('action', function ($res) {
                $view = Helper::CheckPermissionMenu('News', '1');
                $insert = Helper::CheckPermissionMenu('News', '2');
                $update = Helper::CheckPermissionMenu('News', '3');
                $delete = Helper::CheckPermissionMenu('News', '4');
                if ($res->ques_status == 1) {
                    $checked = 'checked';
                } else {
                    $checked = '';
                }
                $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->ques_id . '" data-style="ios" data-on="On" data-off="Off">';
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->news_category_id . '">View</button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->news_category_id . '">Edit</button>';
                $btnEdit = '<button type="button" data-toggle="tooltip" title="Edit"
                                            class="btn btn-warning btn-md btn-edit" data-id="' . $res->ques_id . '">
                                            <i class="ti-pencil-alt"></i>
                                        </button>';
                // $btnDelete = '<button type="button" class="btn btn-danger btn-md btn-delete" data-id="' . $res->news_id . '">Delete</button>';
                $btnDelete = '<button type="button" data-toggle="tooltip" title="Delete"
                                        class="btn btn-danger btn-md btn-delete" data-id="' . $res->ques_id . '">
                                        <i class="ti-trash"></i>
                                    </button>';
                $str = '';
                if ($update) {
                    $str .= ' ' . $btnStatus;
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
            ->rawColumns(['checkbox', 'action', 'faqs_title'])
            ->make(true);
    }

    // public function ChangeStatus(Request $request, $id)
    // {
    //     $status = $request->input('status');
    //     \DB::beginTransaction();
    //     try {
    //         $input_all['logo_status'] = $status;
    //         $input_all['updated_at'] = date('Y-m-d H:i:s');
    //         Logo::where('logo_id', $id)->update($input_all);
    //         \DB::commit();
    //         $return['status'] = 1;
    //         $return['content'] = 'Success';
    //     } catch (Exception $e) {
    //         \DB::rollBack();
    //         $return['status'] = 0;
    //         $return['content'] = 'Unsuccess';
    //     }
    //     $return['title'] = 'Update Status';
    //     return $return;
    // }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            if($id != 'null'){
                if($id == 'multi'){
                    foreach($request->input('id') as $val){
                        $Faqs = Faqs::find($val);
                        if($Faqs->ques_status == 1){
                            $Faqs->ques_status = 0;
                        }else{
                            $Faqs->ques_status = 1;
                        }
                        $Faqs->save();
                    }
                }else{
                    $Faqs = Faqs::find($id);
                    $Faqs->ques_status = $request->input('status');
                    $Faqs->save();
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
        // return $request;
        // $status = $request->input('status');
        \DB::beginTransaction();
        try {
            if($id != 'null'){
                if($id == 'multi'){
                    foreach($request->input('id') as $val){
                        FaqsDetail::where('ques_id', $val)->delete();
                        Faqs::where('ques_id', $val)->delete();
                    }
                }else{
                    FaqsDetail::where('ques_id', $id)->delete();
                    Faqs::where('ques_id', $id)->delete();
                    // return $faqs;
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

}

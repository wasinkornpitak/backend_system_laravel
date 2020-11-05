<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\Logo;
use App\Enquiries;
use App\EnquiriesData;
use App\EnquiriesComment;
use App\Language;
use Auth;

class EnquiriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenus'] = MenuSystem::where('menu_system_part', 'Enquiries')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        // $data['QuestionCategory'] = QuestionCategory::where('ques_category_status', '1')->get();
        // $data['Language'] = Language::where('languages_status', '1')->get();

        if (Helper::CheckPermissionMenu('Enquiries', '1')) {
            return view('admin.Enquiries.enquiries', $data);
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
        $input_all = $request->all();

         $url_temp = public_path('uploads/LogoImageTemp');
        $url_upload = public_path('uploads/LogoImage');
        $file_name_all = $this->readDir($url_temp);

        $validator = Validator::make($request->all(), [
            'logo_title' => 'required',
            // 'logo_image' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $Logo = new Logo;
                foreach ($input_all as $key => $val) {
                    $Logo = Logo::where('logo_id', $input_all['logo_id'])->first();
                    $old_image = $Logo->logo_image;
                    $Logo->{$key} = $val;
                    if (isset($input_all['logo_image'])) {
                        if($old_image){
                            unlink($url_upload . '/' . $old_image);
                        }
                        $image_cut = str_replace("LogoImageTemp/", "", $input_all['logo_image']);
                        $Logo->logo_image = $image_cut;
                        copy($url_temp . '/' . $image_cut, $url_upload . '/' . $image_cut);
                    }
                    if (!isset($input_all['logo_status'])) {
                        $Logo->logo_status = 0;
                    }
                    $Logo->save();
                }


                if ($file_name_all) {
                    foreach ($file_name_all as $val) {
                        $data_pic = explode('/', $val);
                        $cout_path = count($data_pic);
                        $pic_name =  $data_pic[$cout_path - 1];

                        // copy($url_temp . '/' . $pic_name, $url_upload . '/' . $pic_name);
                        unlink($url_temp . '/' . $pic_name);
                    }
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
        $Enquiries = Enquiries::with('EnquiriesData')->find($id);
        $enquiries_commect = EnquiriesComment::where('enquiry_id', $id);
        if(!empty($enquiries_commect)){
            $EnquiriesComment = EnquiriesComment::where('enquiry_id', $id)->with('AdminUser')->get();
        }else{
            $EnquiriesComment = '';
        }
        // $enquiries_arr = array();

        // foreach($Enquiries['enquiries_data'] as $key => $val){
        //     if(isset($val['enquiry_data_input'])){
        //         $enquiries_arr['enquiry_data_input'] = $val['enquiry_data_input'];
        //     }
        //     if(isset($val['enquiry_data_email'])){
        //         $enquiries_arr['enquiry_data_email'] = $val['enquiry_data_email'];
        //     }
        //     if(isset($val['enquiry_data_text'])){
        //         $enquiries_arr['enquiry_data_text'] = $val['enquiry_data_text'];
        //     }
        //     if(isset($val['enquiry_data_number'])){
        //         $enquiries_arr['enquiry_data_number'] = $val['enquiry_data_number'];
        //     }
        // }
        // $enquiries_arr['created_at'] = $Enquiries['created_at'];
        // $enquiries_arr['updated_at'] = $Enquiries['updated_at'];
        // $enquiries_arr['enquiry_status'] = ($Enquiries['enquiry_status'] == 1) ? 'Action' : 'No Action' ;

        $return['enquiries'] = $Enquiries;
        $return['enquiries_comment'] = $EnquiriesComment;
        $return['status'] = 1;
        $return['title'] = 'Get Enquiries';
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

        $url_temp = public_path('uploads/LogoImageTemp');
        $url_upload = public_path('uploads/LogoImage');
        $file_name_all = $this->readDir($url_temp);


        $validator = Validator::make($request->all(), [
            'logo_title' => 'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $Logo = Logo::find($id);
                foreach ($input_all as $key => $val) {
                    $old_image = $Logo->logo_image;
                    $Logo->{$key} = $val;
                    if (isset($input_all['logo_image'])) {
                        if($old_image){
                            unlink($url_upload . '/' . $old_image);
                        }
                        $image_cut = str_replace("LogoImageTemp/", "", $input_all['logo_image']);
                        $Logo->logo_image = $image_cut;
                        copy($url_temp . '/' . $image_cut, $url_upload . '/' . $image_cut);

                    }
                }
                if (!isset($input_all['logo_status'])) {
                    $Logo->logo_status = 0;
                }
                // if (isset($input_all['logo_image'])) {
                //     $Logo->logo_image = str_replace("LogoImage/", "", $input_all['logo_image']);
                // }
                $Logo->save();

                if ($file_name_all) {
                    foreach ($file_name_all as $val) {
                        $data_pic = explode('/', $val);
                        $cout_path = count($data_pic);
                        $pic_name =  $data_pic[$cout_path - 1];

                        // copy($url_temp . '/' . $pic_name, $url_upload . '/' . $pic_name);
                        unlink($url_temp . '/' . $pic_name);
                    }
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
        // $result = Enquiries::select()->with('EnquiriesData', 'EnquiriesComment')->orderBy('created_at', 'DESC');
        $result = Enquiries::select('enquiry.*', 'enquiry_data.enquiry_id as enquiry_id_data')->orderBy('created_at', 'DESC')
                            ->join('enquiry_data', 'enquiry_data.enquiry_id', 'enquiry.enquiry_id')
                            ->leftJoin('enquiry_comment', 'enquiry_comment.enquiry_id', 'enquiry.enquiry_id');

        $enquiries_name = $request->input('enquiries_name');
        $enquiries_email = $request->input('enquiries_email');
        $enquiries_phone = $request->input('enquiries_phone');
        $create_date = $request->input('create_date');
        $update_date = $request->input('update_date');
        $status = $request->input('status');

        // return $status;

        if($enquiries_name){
            $result->where('enquiry_data.enquiry_data_input', 'like', '%'.$enquiries_name.'%');
        }

        if($enquiries_email){
            $result->where('enquiry_data.enquiry_data_email', 'like', '%'.$enquiries_email.'%');
        }

        if($enquiries_phone){
            $result->where('enquiry_data.enquiry_data_number', 'like', '%'.$enquiries_phone.'%');
        }

        if($create_date){
            $result->where('enquiry.created_at', '>=', $create_date.' 00:00:00')->where('enquiry.created_at', '<=', $create_date.' 23:59:59');
        }

        if($update_date){
            $result->where('enquiry.updated_at', '>=', $update_date.' 00:00:00')->where('enquiry.updated_at', '<=', $update_date.' 23:59:59');
        }

        if($status == 'all'){
            $result->whereIn('enquiry.enquiry_status', [0, 1]);
        }else if($status == 1){
            $result->where('enquiry.enquiry_status', 1);
        }else if($status == 0){
            $result->where('enquiry.enquiry_status', 0);
        }

        $result->groupBy('enquiry_id_data');

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
                        <input type="checkbox" class="custom-control-input checkbox-table" name="select-news" id="checkbox-item-' . $res->enquiry_id . '" value="'.$res->enquiry_id .'">
                        <label class="custom-control-label" for="checkbox-item-' . $res->enquiry_id . '"></label>
                    </div>';
                return $str;
            })
            ->addColumn('name', function ($res) {
                $str = '';
                if(isset($res->EnquiriesData)){
                    foreach($res->EnquiriesData as $keys=> $value){
                        if(isset($value['enquiry_data_input'])){
                            $str = $value['enquiry_data_input'];
                        }
                    }
                }

                return $str;
            })
            ->addColumn('email', function ($res) {
                $str = '';
                if(isset($res->EnquiriesData)){
                    foreach($res->EnquiriesData as $keys=> $value){
                        if(isset($value['enquiry_data_email'])){
                            $str = $value['enquiry_data_email'];
                        }
                    }
                }

                return $str;
            })
            // ->addColumn('name', function ($res) {
            //     $str = '';
            //     if(isset($res->EnquiriesData)){
            //         foreach($res->EnquiriesData as $keys=> $value){
            //             if(isset($value['enquiry_data_text'])){
            //                 $str = $value['enquiry_data_text'];
            //             }
            //         }
            //     }

            //     return $str;
            // })
            ->addColumn('phone', function ($res) {
                $str = '';
                if(isset($res->EnquiriesData)){
                    foreach($res->EnquiriesData as $keys=> $value){
                        if(isset($value['enquiry_data_number'])){
                            $str = $value['enquiry_data_number'];
                        }
                    }
                }

                return $str;
            })
            ->addColumn('status', function ($res) {
                $str = '';
                if(isset($res['enquiry_status']) && $res['enquiry_status'] == 1){
                    $str = 'Action';
                }else{
                    $str = 'No Action';
                }

                return $str;
            })
            ->addColumn('comment', function ($res) {
                $str = '';
                if(isset($res->EnquiriesComment[0])){
                    $str = $res->EnquiriesComment[0]['enquiry_comment_comment'];
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
                // $btnStatus = '<input type="checkbox" class="toggle change-status" ' . $checked . ' data-id="' . $res->ques_id . '" data-style="ios" data-on="On" data-off="Off">';
                // $btnView = '<button type="button" class="btn btn-success btn-md btn-view" data-id="' . $res->news_category_id . '">View</button>';
                $btnView = '<button type="button" data-toggle="tooltip" title="View"
                                            class="btn btn-info btn-md btn-view"  data-id="' . $res->enquiry_id . '">
                                            <i class="ti-eye"></i>
                                        </button>';
                // $btnEdit = '<button type="button" class="btn btn-info btn-md btn-edit" data-id="' . $res->news_category_id . '">Edit</button>';
                // $btnEdit = '<button type="button" data-toggle="tooltip" title="Edit"
                //                             class="btn btn-warning btn-md btn-edit" data-id="' . $res->ques_id . '">
                //                             <i class="ti-pencil-alt"></i>
                //                         </button>';
                // $btnDelete = '<button type="button" class="btn btn-danger btn-md btn-delete" data-id="' . $res->news_id . '">Delete</button>';
                $btnDelete = '<button type="button" data-toggle="tooltip" title="Delete"
                                        class="btn btn-danger btn-md btn-delete" data-id="' . $res->enquiry_id . '">
                                        <i class="ti-trash"></i>
                                    </button>';
                $str = '';
                if ($view) {
                    $str .= ' ' . $btnView;
                }
                // if ($update) {
                //     $str .= ' ' . $btnEdit;
                // }
                if ($delete) {
                    $str .= ' ' . $btnDelete;
                }
                return $str;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'action', 'name', 'email', 'phone', 'status', 'comment'])
            ->make(true);
    }

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
                        Enquiries::where('enquiry_id', $val)->delete();
                        EnquiriesData::where('enquiry_id', $val)->delete();
                        EnquiriesComment::where('enquiry_id', $val)->delete();
                    }
                }else{
                    Enquiries::where('enquiry_id', $id)->delete();
                    EnquiriesData::where('enquiry_id', $id)->delete();
                    EnquiriesComment::where('enquiry_id', $id)->delete();
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

    public function AddComment(Request  $request, $id){

        $admin = Auth::guard('admin')->user();

        \DB::beginTransaction();
        try {
            $EnquiriesComment = new EnquiriesComment;
            $EnquiriesComment->enquiry_id = $id;
            $EnquiriesComment->admin_id = $admin->admin_id;
            $EnquiriesComment->enquiry_comment_comment = $request->enquiry_comment;
            $EnquiriesComment->enquiry_comment_status = $request->enquiry_comment_status;

            $EnquiriesComment->save();
            $enquiries_comment_id = $EnquiriesComment->getKey();

            $data = EnquiriesComment::find($enquiries_comment_id)->with('AdminUser')->orderBy('created_at', 'DESC')->first();

            \DB::commit();
            $return['status'] = 1;
            $return['data'] = $data;
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


    // public function Delete(Request $request, $id)
    // {
    //     // $status = $request->input('status');
    //     \DB::beginTransaction();
    //     try {
    //         if($id != 'null'){
    //             if($id == 'multi'){
    //                 foreach($request->input('id') as $val){
    //                     News::where('news_id', $val)->delete();
    //                 }
    //             }else{
    //                 News::where('news_id', $id)->delete();
    //                 NewsDetail::where('news_id', $id)->delete();

    //             }
    //             \DB::commit();
    //             $return['status'] = 1;
    //             $return['content'] = 'Success';
    //         }else{
    //             $return['status'] = 2;
    //             $return['content'] = 'Unsuccess Plese select';
    //         }
    //     } catch (Exception $e) {
    //         \DB::rollBack();
    //         $return['content'] = 'Unsuccess';
    //     }
    //     $return['title'] = 'Delete Status';
    //     return $return;
    // }
}

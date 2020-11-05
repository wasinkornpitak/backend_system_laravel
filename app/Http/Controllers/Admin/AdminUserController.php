<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Helper;
use App\MenuSystem;
use App\AdminUser;
use App\NamePrefix;
use App\AdminUserGroup;
use App\Gender;
use App\AdminGroup;
use App\PermissionAction;
use App\DevPosition;
use Storage;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data['MainMenu'] = MenuSystem::where('menu_system_part','AdminUser')->with('MainMenu')->first();
          $data['Menus'] = MenuSystem::ActiveMenu()->get();
          $data['PermisstionMenus'] = MenuSystem::whereNull('menu_system_main_menu')->with('SubMenu')->orderBy('menu_system_z_index')->get();
          $data['AdminUserGroups'] = AdminUserGroup::where('admin_user_group_status', 1)->get();
          $data['Genders'] = Gender::where('gender_status', 1)->get();
          $data['DevPositions'] = DevPosition::where('dev_position_status', 1)->get();
          $data['NamePrefixs'] = NamePrefix::where('name_prefix_status', 1)->get();
          if(Helper::CheckPermissionMenu('AdminUser' , 1)){
              return view('admin.AdminUser.admin_user', $data);
          }else{
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
        if(isset($input_all['admin_user_group_id'])){
            $admin_user_group_id = $input_all['admin_user_group_id'];
            unset($input_all['admin_user_group_id']);
        }
        $validator = Validator::make($request->all(), [
            'gender_id'=>'required',
            'dev_position_id'=>'required',
            'name_prefix_id'=>'required',
            'username'=>'required|unique:admin_user,username',
            'password'=>'required',
            'email'=>'unique:admin_user,email',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $AdminUser = new AdminUser;
                foreach($input_all as $key=>$val){
                    $AdminUser->{$key} = $val;
                }
                if(!isset($input_all['status'])){
                    $AdminUser->status = 0;
                }
                $AdminUser->password = \Hash::make($AdminUser->password);
                $AdminUser->save();
                if(isset($admin_user_group_id) && $admin_user_group_id){
                    foreach($admin_user_group_id as $val){
                        $AdminGroup = new AdminGroup;
                        $AdminGroup->admin_id = $AdminUser->admin_id;
                        $AdminGroup->admin_user_group_id = $val;
                        $AdminGroup->save();
                    }
                }
                \DB::commit();
                $return['status'] = 1;
                $return['title'] = 'Insert';
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['title'] = 'Insert';
                $return['content'] = 'Unsuccess';
            }
        }else{
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if(isset($failedRules['gender_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Gender is required";
            }
            if(isset($failedRules['name_prefix_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name prefix is required";
            }
            if(isset($failedRules['dev_position_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Position is required";
            }
            if(isset($failedRules['username']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Username is required";
            }
            if(isset($failedRules['password']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Password is required";
            }
            if(isset($failedRules['username']['Unique'])) {
                $return['status'] = 2;
                $return['title'] = "This username is already in use.";
            }
            if(isset($failedRules['email']['Unique'])) {
                $return['status'] = 2;
                $return['title'] = "This email is already in use.";
            }
        }
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
        $content = AdminUser::with('AdminGroup.AdminUserGroup', 'Gender', 'NamePrefix', 'PermissionAction', 'DevPosition')->find($id);
        $content->format_created_at = $content->created_at ? date('d/m/Y', strtotime($content->created_at)) : '';
        $content->format_last_login = $content->last_login ? date('d/m/Y', strtotime($content->last_login)) : '';
        $return['status'] = 1;
        $return['title'] = 'Get AdminUser';
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
        if(isset($input_all['admin_user_group_id'])){
            $admin_user_group_id = $input_all['admin_user_group_id'];
            unset($input_all['admin_user_group_id']);
        }
        $check_username = AdminUser::where('username', $input_all['username'])->whereNotIn('admin_id', [$id])->first();
        if($check_username){
            $return['status'] = 0;
            $return['title'] = 'Update';
            $return['content'] = 'This username is already in use.';
            return $return;
        }
        $check_email = AdminUser::where('email', $input_all['email'])->whereNotIn('admin_id', [$id])->first();
        if($check_username){
            $return['status'] = 0;
            $return['title'] = 'Update';
            $return['content'] = 'This email is already in use.';
            return $return;
        }

        $validator = Validator::make($request->all(), [
            'gender_id'=>'required',
            'dev_position_id'=>'required',
            'name_prefix_id'=>'required',
            'username'=>'required',
            'email'=>'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $AdminUser = AdminUser::find($id);
                foreach($input_all as $key=>$val){
                    $AdminUser->{$key} = $val;
                }
                if(!isset($input_all['status'])){
                    $AdminUser->status = 0;
                }
                $AdminUser->password = \Hash::make($AdminUser->password);
                $AdminUser->save();
                if(isset($admin_user_group_id) && $admin_user_group_id){
                    AdminGroup::whereNotIn('admin_user_group_id', $admin_user_group_id)->where('admin_id', $id)->delete();
                    foreach($admin_user_group_id as $val){
                        $AdminGroup = AdminGroup::where('admin_user_group_id', $val)->where('admin_id', $id)->first();
                        if(!$AdminGroup){
                            $AdminGroup = new AdminGroup;
                        }
                        $AdminGroup->admin_id = $AdminUser->admin_id;
                        $AdminGroup->admin_user_group_id = $val;
                        $AdminGroup->save();
                    }
                }
                \DB::commit();
                $return['status'] = 1;
                $return['title'] = 'Insert';
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['title'] = 'Insert';
                $return['content'] = 'Unsuccess';
            }
        }else{
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if(isset($failedRules['gender_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Gender is required";
            }
            if(isset($failedRules['name_prefix_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Name prefix is required";
            }
            if(isset($failedRules['dev_position_id']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Position is required";
            }
            if(isset($failedRules['username']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Username is required";
            }
            if(isset($failedRules['email']['required'])) {
                $return['status'] = 2;
                $return['title'] = "E-mail is required";
            }
        }
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

    public function lists(Request $request)
    {
        $result = AdminUser::select(
            'admin_user.*'
            ,'gender.gender_name'
        )
        ->leftjoin('gender', 'gender.gender_id', 'admin_user.gender_id')
        ->leftjoin('admin_group', 'admin_group.admin_id', 'admin_user.admin_id')
        ->with('AdminGroup.AdminUserGroup');
        $username = $request->input('username');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $ip = $request->input('ip');
        $email = $request->input('email');
        $gender_id = $request->input('gender_id');
        $admin_user_group_id = $request->input('admin_user_group_id');
        if($username){
            $result->where('admin_user.username', 'like', '%'.$username.'%');
        }
        if($first_name){
            $result->where('admin_user.first_name', 'like', '%'.$first_name.'%');
        }
        if($last_name){
            $result->where('admin_user.last_name', 'like', '%'.$last_name.'%');
        }
        if($ip){
            $result->where('admin_user.ip', 'like', '%'.$ip.'%');
        }
        if($email){
            $result->where('admin_user.email', 'like', '%'.$email.'%');
        }
        if($gender_id && $gender_id != 'all'){
            $result->where('admin_user.gender_id', $gender_id);
        }
        if($admin_user_group_id){
            $result->whereIn('admin_group.admin_user_group_id', $admin_user_group_id);
        }
        $result->groupBy('admin_user.admin_id');
        return Datatables::of($result)
        ->addColumn('last_login' , function($res){
            return $res->last_login ? date("d/m/Y", strtotime($res->last_login)) : '';
        })
        ->addColumn('created_at' , function($res){
            return $res->created_at ? date("d/m/Y", strtotime($res->created_at)) : '';
        })
        ->addColumn('admin_name' , function($res){
            return $res->first_name.' '.$res->last_name;
        })
        ->addColumn('color_code' , function($res){
            return '<i style="color:'.$res->color_code.';" class="mdi mdi-checkbox-blank-circle mdi-24px"></i>';
        })
        ->addColumn('admin_user_group' , function($res){
            $html = '';
            foreach($res->AdminGroup as $val){
                if($val->AdminUserGroup){
                    $color = '#ccc';
                    if($val->AdminUserGroup->admin_user_group_color_code){
                        $color = $val->AdminUserGroup->admin_user_group_color_code;
                    }
                    $html .= '<span class="badge badge-pill text-white" style="background-color: '.$color.'">'.$val->AdminUserGroup->admin_user_group_name.'</span><br>';
                }
            }
            return $html;
        })
        ->addColumn('action' , function($res){
            $view = Helper::CheckPermissionMenu('AdminUser', 1);
            $insert = Helper::CheckPermissionMenu('AdminUser', 2);
            $update = Helper::CheckPermissionMenu('AdminUser', 3);
            $delete = Helper::CheckPermissionMenu('AdminUser', 4);
            if($res->status == 1){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            $btnStatus = '<input type="checkbox" class="toggle change-status" '.$checked.' data-id="'.$res->admin_id.'" data-style="ios" data-on="On" data-off="Off">';
            $btnView = '<button type="button" class="btn btn-info btn-md btn-view" data-id="'.$res->admin_id.'">View</button>';
            $btnEdit = '<button type="button" class="btn btn-warning btn-md btn-edit" data-id="'.$res->admin_id.'">Edit</button>';
            $btnResetPassword = '<button type="button" class="btn btn-danger btn-md btn-reset-password text-white" data-id="'.$res->admin_id.'">Reset Password</button>';
            $btnPremission = '<button type="button" class="btn btn-success btn-md btn-permission text-white" data-id="'.$res->admin_id.'">Permission</button>';
            $str = '';
            if($update){
                $str.=' '.$btnStatus;
            }
            if($view){
                $str.=' '.$btnView;
            }
            if($update){
                $str.=' '.$btnEdit;
            }
            $str.=' '.$btnPremission;
            $str.=' '.$btnResetPassword;
            return $str;
        })
        ->addIndexColumn()
        ->rawColumns(['color_code', 'action', 'admin_user_group'])
        ->make(true);
    }

    public function ChangeStatus(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $AdminUser = AdminUser::find($id);
            $AdminUser->status = $request->input('status');
            $AdminUser->save();
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

    public function SetPremission(Request $request, $id)
    {
        $input_all = $request->all();
        if(isset($input_all['menu'])){
            $menus = $input_all['menu'];
            unset($input_all['menu']);
        }
        \DB::beginTransaction();
        try {
            if(isset($menus) && $menus){
                PermissionAction::where('admin_id', $id)->update(['permission_action_status' => 0]);
                foreach($menus as $menu_id => $menu){
                    foreach($menu as $val){
                        $check = PermissionAction::where('admin_id', $id)->where('menu_system_id', $menu_id)->where('permission_action_code_action', $val)->first();
                        if($check){
                            PermissionAction::where('admin_id', $id)->where('menu_system_id', $menu_id)->where('permission_action_code_action', $val)->update(['permission_action_status' => 1]);
                        }else{
                            $PermissionAction = new PermissionAction;
                            $PermissionAction->admin_id = $id;
                            $PermissionAction->menu_system_id = $menu_id;
                            $PermissionAction->permission_action_code_action = $val;
                            $PermissionAction->permission_action_status = 1;
                            $PermissionAction->save();
                        }
                    }
                }
            }else{
                PermissionAction::where('admin_id', $id)->update(['permission_action_status' => 0]);
            }
            \DB::commit();
            $return['status'] = 1;
            $return['content'] = 'Success';
        } catch (Exception $e) {
            \DB::rollBack();
            $return['status'] = 0;
            $return['content'] = 'Unsuccess';
        }
        $return['title'] = 'Update Permission';
        return $return;
    }

    public function ResetPassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password'=>'required',
        ]);
        if (!$validator->fails()) {
            \DB::beginTransaction();
            try {
                $AdminUser = AdminUser::find($id);
                $AdminUser->password = \Hash::make($request->input('password'));
                $AdminUser->save();
                \DB::commit();
                $return['status'] = 1;
                $return['content'] = 'Success';
            } catch (Exception $e) {
                \DB::rollBack();
                $return['status'] = 0;
                $return['content'] = 'Unsuccess';
            }
        }else{
            $failedRules = $validator->failed();
            $return['content'] = 'Unsuccess';
            if(isset($failedRules['password']['required'])) {
                $return['status'] = 2;
                $return['title'] = "Password is required";
            }
        }
        $return['title'] = 'Reset Password';
        return $return;
    }
}

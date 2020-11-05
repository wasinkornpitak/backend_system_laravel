<?php
namespace App;
use Auth;
use App\MenuSystem;
use App\Runnumber;
use App\RunCode;

class Helper
{
    public static function CheckPermissionMenu($url, $permission){
        $admin_id = Auth::guard('admin')->user()->admin_id;
        $check_permission_department = MenuSystem::join('permission_action_by_group', 'permission_action_by_group.menu_system_id', 'menu_system.menu_system_id')
                  ->join('admin_group', 'admin_group.admin_user_group_id', 'permission_action_by_group.admin_user_group_id')
                  ->where([
                      'menu_system.menu_system_status' => 1,
                      'menu_system.menu_system_part' => $url,
                      'admin_group.admin_id' => $admin_id,
                      'permission_action_by_group.permission_action_by_group_code_action' => $permission,
                      'permission_action_by_group.permission_action_by_group_status' => 1,
                  ])->first();
        $check_permission_admin_user = MenuSystem::join('permission_action', 'permission_action.menu_system_id', 'menu_system.menu_system_id')
                  ->where([
                      'menu_system.menu_system_status' => 1,
                      'menu_system.menu_system_part' => $url,
                      'permission_action.admin_id' => $admin_id,
                      'permission_action.permission_action_code_action' => $permission,
                      'permission_action.permission_action_status' => 1,
                  ])->first();
        if($check_permission_department || $check_permission_admin_user){
            return true;
        }else{
            return false;
        }
    }

    public static function RunDocNo($run_code_id , $increment = false)
    {
        $year = date('Y');
        $month = date('Y-m');
        $RunCode = RunCode::find($run_code_id);
        $run_number = '';
        if($RunCode->run_code_type_run == 1){ //รายเดือน
            $Runnumber = Runnumber::where([
                'run_code_id' => $run_code_id,
                'runnumber_type' => $RunCode->run_code_type,
                'runnumber_type_run' => $RunCode->run_code_type_run,
            ])
            ->whereYear('runnumber_date', $year)
            ->whereMonth('runnumber_date', $month)
            ->first();
            if($Runnumber){
                $numner = ($Runnumber->runnumber_number + 1);
                if($increment){
                    Runnumber::where([
                        'run_code_id' => $run_code_id,
                        'runnumber_type' => $RunCode->run_code_type,
                        'runnumber_type_run' => $RunCode->run_code_type_run,
                    ])
                    ->whereYear('runnumber_date', $year)
                    ->whereMonth('runnumber_date', $month)
                    ->increment('runnumber_number');
                }
            }else{
                $numner = 1;
                if($increment){
                    $Runnumber = new Runnumber;
                    $Runnumber->run_code_id = $run_code_id;
                    $Runnumber->runnumber_code = $RunCode->run_code_code;
                    $Runnumber->runnumber_code = $RunCode->run_code_code;
                    $Runnumber->runnumber_type = $RunCode->run_code_type;
                    $Runnumber->runnumber_type_run = $RunCode->run_code_type_run;
                    $Runnumber->runnumber_date = date('Y-m-d');
                    $Runnumber->runnumber_number = $numner;
                    $Runnumber->save();
                }
            }
            $format_year = date('y', strtotime($year));
            $format_month = date('m', strtotime($month));
            $numner = str_pad($numner, 6, "0", STR_PAD_LEFT);
            $run_number = $RunCode->run_code_code.$format_year.$format_month.'-'.$numner;
        }elseif($RunCode->run_code_type_run == 2){ //รายปี
            $Runnumber = Runnumber::where([
                'run_code_id' => $run_code_id,
                'runnumber_type' => $RunCode->run_code_type,
                'runnumber_type_run' => $RunCode->run_code_type_run,
            ])
            ->whereYear('runnumber_date', $year)
            ->first();
            if($Runnumber){
                $numner = ($Runnumber->runnumber_number + 1);
                if($increment){
                    Runnumber::where([
                        'run_code_id' => $run_code_id,
                        'runnumber_type' => $RunCode->run_code_type,
                        'runnumber_type_run' => $RunCode->run_code_type_run,
                    ])
                    ->whereYear('runnumber_date', $year)
                    ->increment('runnumber_number');
                }
            }else{
                $numner = 1;
                if($increment){
                    $Runnumber = new Runnumber;
                    $Runnumber->run_code_id = $run_code_id;
                    $Runnumber->runnumber_code = $RunCode->run_code_code;
                    $Runnumber->runnumber_code = $RunCode->run_code_code;
                    $Runnumber->runnumber_type = $RunCode->run_code_type;
                    $Runnumber->runnumber_type_run = $RunCode->run_code_type_run;
                    $Runnumber->runnumber_date = date('Y-m-d');
                    $Runnumber->runnumber_number = $numner;
                    $Runnumber->save();
                }
            }
            $numner = str_pad($numner, 6, "0", STR_PAD_LEFT);
            $run_number = $RunCode->run_code_code.$year.'-'.$numner;
        }

        return $run_number;
    }
}

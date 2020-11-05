<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MenuSystem;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['MainMenu'] = MenuSystem::where('menu_system_part','Dashboard')->with('MainMenu')->first();
        $data['Menus'] = MenuSystem::ActiveMenu()->get();
        return view('admin.dashboard', $data);
    }
}

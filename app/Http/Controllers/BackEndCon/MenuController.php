<?php

namespace App\Http\Controllers\BackEndCon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = "";
        $menus .= '<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
        $menus .= $this->generate_multilevel_menus();
        return $menus;
    }

    private static function generate_multilevel_menus($parent_id=0)
    {
        if ($parent_id == 0) {
            $attributes = ' class="nav side-menu"';
        } else {
            $attributes = ' class="nav child_menu"';
        }
        $html = "";
        $menues = Menu::where('parent_id', $parent_id)->orderBy('serial_no')->get();
        if ($menues->count() >0 ) {
            $html .= "<ul$attributes>";
            foreach ($menues as $key => $menu) {
                if ($menu->route_name && $menu->route_name == '#') {
                    $html .= "<li><a><i class='$menu->icon'></i> $menu->menu_name"; // $menu->parent_id
                    $html .= "<span class='fa fa-chevron-down'></span>";
                } else {
                    $html .= "<li><a href='$menu->route_name'><i class='$menu->icon'></i> $menu->menu_name"; // $menu->parent_id
                }
                $html .= "</a>";
                $html .= MenuController::generate_multilevel_menus($menu->id);
                
                $html .= "</li>";
            }
            $html .= "</ul>";
        }
        return $html;
    }

    public static function getMenus()
    {
        $html = MenuController::generate_multilevel_menus();
        return $html;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
}

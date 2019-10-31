<?php

namespace App\Http\Controllers\DevCon;

use App\DataTables\DevTables\SubMenusDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Menu;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubMenusDataTable $menu)
    {
        return $menu->render('Admin.devSubMenu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $main_menus = Menu::all();
        return view('Admin.devSubMenu.create', compact('main_menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'serial_no' => 'required',
            'parent_id' => 'required',
            'menu_name' => 'required',
            'selector' => 'required',
            'route_name' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        $insert = Menu::create($data);
        if ($insert) {
            session()->flash('success', 'Menu Created Successfully');
        } else {
            session()->flash('error', 'Something Went Wrong!');
        }
        return redirect()->back();
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
        $main_menus = Menu::all();
        $sub_menu = Menu::find($id);
        return view('Admin.devSubMenu.edit', compact('main_menus', 'sub_menu'));
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
        $this->validate($request, [
            'serial_no' => 'required',
            'parent_id' => 'required',
            'menu_name' => 'required',
            'selector' => 'required',
            'route_name' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();

        $menu = Menu::find($id);
        $update = $menu->update($data);
        if ($update) {
            session()->flash('success', 'Menu Updated Successfully');
        } else {
            session()->flash('error', 'Something Went Wrong!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Menu::find($id)->delete();
        if ($branch) {
            return response()->json(["success" => true]);
        } else {
            return response()->json(["success" => false]);
        }
    }
}

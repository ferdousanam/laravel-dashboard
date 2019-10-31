<?php

namespace App\Http\Controllers\DevCon;

use App\DataTables\DevTables\MenusDataTable;
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
    public function index(MenusDataTable $menu)
    {
        return $menu->render('Admin.devMenu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.devMenu.create');
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
            'menu_name' => 'required',
            'selector' => 'required',
            'route_name' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        $data['parent_id'] = 0;
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
        $main_menu = Menu::find($id);
        return view('Admin.devMenu.edit', compact('main_menu'));
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
            'menu_name' => 'required',
            'selector' => 'required',
            'route_name' => 'required',
            'status' => 'required',
        ]);
        $data = $request->all();
        $data['parent_id'] = 0;

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

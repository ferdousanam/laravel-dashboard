<?php

namespace App\Http\Controllers\BackEndCon;

use App\DataTables\UserTypesDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Priority;

class UserTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserTypesDataTable $user_types)
    {
        return $user_types->render('Admin.userTypes.index-dt');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.userTypes.create');
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
            'priority_name' => 'required',
            'priority_status' => 'required',
        ]);
        $data = $request->all();
        $insert = Priority::create($data);
        if ($insert) {
            session()->flash('success', 'User Type Created Successfully');
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
        $user_type = Priority::find($id);
        return view('Admin.userTypes.edit', compact('user_type'));
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
            'priority_name' => 'required',
            'priority_status' => 'required',
        ]);
        $data = $request->all();

        $priority = Priority::find($id);
        $update = $priority->update($data);
        if ($update) {
            session()->flash('success', 'User Type Updated Successfully');
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
        $delete = Priority::find($id)->delete();
        if ($delete) {
            return response()->json(["success" => true]);
        } else {
            return response()->json(["success" => false]);
        }
    }
}

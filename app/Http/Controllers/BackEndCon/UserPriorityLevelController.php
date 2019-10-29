<?php

namespace App\Http\Controllers\BackEndCon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Priority;
use Illuminate\Support\Facades\DB;

class UserPriorityLevelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $priority = Priority::all();
    return view('Admin.userPriorityLevel.index', compact('priority'));
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
    return view('Admin.userPriorityLevel.getAppModuleView', compact('id'));
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
    $this->validate($request, array(
        'priority_id' => 'required',
        'menu_id' => 'required',
    ), array(
        'menu_id.required' => 'Please select at least one Menu'
    ));

    $priority = DB::table('priority_menu')
        ->where('priority_id', $request->priority_id)
        ->delete();
    foreach ($request->menu_id as $key => $value) {
      $data = array(
        'priority_id' => $request->priority_id,
        'menu_id' => $value
      );

      $insert = DB::table('priority_menu')->insert($data);
    }
    if ($insert) {
      session()->flash('success', 'User Permission Set Successfully');
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
    //
  }
}

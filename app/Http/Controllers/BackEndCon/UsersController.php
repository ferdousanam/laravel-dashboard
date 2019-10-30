<?php

namespace App\Http\Controllers\BackEndCon;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminModel\Priority;
use App\Models\Admin\User;

class UsersController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(UsersDataTable $users)
  {
      return $users->render('Admin.users.index-dt');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $priority = Priority::all();
    return view('Admin.users.create', compact('priority'));
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
      'name' => 'required',
      'email' => 'required',
      'password' => 'required',
      'user_level' => 'required',
      'status' => 'required',
    ]);
    $data = $request->all();
    $data['password'] = bcrypt($data['password']);
    $insert = User::create($data);
    if ($insert) {
      session()->flash('success', 'User Created Successfully');
      return redirect(route('user.index'));
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
    $user = User::find($id);
    $priority = Priority::all();
    return view('Admin.users.edit', compact('user', 'priority'));
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
      'name' => 'required',
      'email' => 'required',
      'user_level' => 'required',
      'status' => 'required',
      'update_password' => 'required',
    ]);
    $data = array(
      'name' => $request->name,
      'email' => $request->email,
      'user_level' => $request->user_level,
      'status' => $request->status,
    );
    if ($request->update_password == 1) {
      $data['password'] = bcrypt($request->password);
    }
    $user = User::find($id);
    $update = $user->update($data);
    if ($update) {
      session()->flash('success', 'User Updated Successfully');
      return redirect(route('user.index'));
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
    $delete = User::find($id)->delete();
    if ($delete) {
      return response()->json(["success" => true]);
    } else {
      return response()->json(["success" => false]);
    }
  }
}

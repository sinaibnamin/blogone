<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
      $users=User::all();
      return view('admin.user.index',compact('users'));
    }
    public function create(){
      return view('admin.user.create');
    }
    public function store(){
      return view('admin.user.create');
    }
    public function edit(User $user){
      return view('admin.user.edit');
    }
    public function update(Request $request, User $user){
      return view('admin.user.update');
    }
    public function destroy(User $user){
      if ($user) {
        $user->delete;
        return redirect()->back();
      }
    }
}

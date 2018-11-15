<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MemberController extends Controller {
  public function __construct() {
    $this->middleware('auth');
  }

  // 회원정보 보기(get)
  public function getMemberInfo() {
    $member = Auth::user();
    return view('member.info', ['member' => $member]);
  }

  // 회원정보 수정(post)
  public function postMemberInfo() {
    $member = Auth::user();
    $this->validate($request, [
      'name' => 'required|string|max:255',
    ]);
    $member->name=$request->name;
    if($request->email!=$member->email) {
    $this->validate($request, [
      'email' => 'required|string|email|max:255|unique:users',
    ]);
    $member->email=$request->email;
    }
    if ($request->password) {
      $this->validate($request, [
        'password' => 'string|min:6|confirmed',
      ]);
      $member->password=bcrypt($request->password);
    }

    $member->save();
    return redirect()->back();
  }

  // 회원탈퇴(get)
  public function getMemberLeave()
  {
  return view('member.leave');
  }
  // 회원탈퇴(post)
  public function postMemberLeave(Request $request)
  {
    $member = Auth::user();
    if (\Hash::check($request->password, $member->password)) {
      $member->name = '(탈퇴한 회원)';
      $member->email = date('Uu');
      $member->password = '';
      $member->is_admin = false;
      $member->save();
      Auth::logout();
      return redirect('/');
    }
    else {
      return redirect()->back()->withErrors(['password' => '비밀번호가 틀립니다.']);
    }
  }

  // 회원관리-목록(get)
  public function getMemberAdminList() {
    if(!Auth::user()->is_admin)
      abort(401);
    return view('member.admin.list',
    [ 'members' => \App\User::all() ]);
  }

  // 회원관리-보기(get)
  public function getMemberAdminInfo($member)
  {
    if(!Auth::user()->is_admin)
      abort(401);

    $member = \App\User::find($member);
    if(!$member || !$member->password)
      abort(404);

    return view('member.admin.info', ['member' => $member]);
  }

  // 회원관리-수정(post)
  public function postMemberAdminEdit(Request $request, $member)
  {
    if(!Auth::user()->is_admin)
      abort(401);
    $member = \App\User::find($member);
    if(!$member || !$member->password)
      abort(404);
    $this->validate($request, [
      'name' => 'required|string|max:255',
    ]);
    $member->name=$request->name;
    if ($request->email!=$member->email) {
      $this->validate($request, [
        'email' => 'required|string|email|max:255|unique:users',
      ]);
      $member->email=$request->email;
    }
    if ($request->password) {
      $this->validate($request, [
        'password' => 'string|min:6',
      ]);
      $member->password=bcrypt($request->password);
    }

    $member->save();
    return redirect()->back();
  }

  // 회원관리-삭제(post)
  public function postMemberAdminRemove(Request $request, $member)
  {
    if(!Auth::user()->is_admin)
      abort(401);
    $member = \App\User::find($member);
    if(!$member || !$member->password)
      abort(404);
    $member->name = '(탈퇴한 회원)';
    $member->email = date('Uu');
    $member->password = '';
    $member->is_admin= false;
    $member->save();
    return redirect('/member/admin');
  }
}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserReQuest;
use App\User;
use Hash;
use Auth;
class UserController extends Controller {

	public function getList(){
    $user = User::select('id','username','level')->orderBy('id','DESC')->get()->toArray();
    return view('admin.user.list',compact('user'));
  }
  public function getAdd(){
    return view('admin.user.add');
  }

  public function postAdd(UserReQuest $request){
      $user=new User();
      $user->username=$request->txtUser;
      $user->password=Hash::make($request->txtPass);
      $user->Email=$request->txtEmail;
      $user->level=$request->rdoLevel;
      $user->remember_token=$request->_token;
      $user->save();
      return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Thành công thêm tài khoản']);
  }

  public function getDelete($id){
		$user_current_login=Auth::user()->id;
		$user=User::find($id);
		if(($id==1)||($user_current_login!=1 && $user["level"]==1 )){
			return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Không thể truy cập tính năng']);
		}else{
			$user->delete($id);
			return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Xóa thành công']);
		}
  }

  public function getEdit($id){
		$data=User::find($id);
		if((Auth::user()->id != 1)&&($id==1||($data['level']==1 && (Auth::user()->id != $id )))){
				return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Không thể truy cập tính năng']);
		}
			return view('admin.user.edit',compact('data','id'));
  }

  public function postEdit($id,Request $request){
		$user=User::find($id);
		if($request->input('txtPass')){
			$this->validate($request,
			[
				'txtRePass'=>'same:txtPass'
			],[
				'txtRepass.same'=>'Nhập lại mật khẩu không đúng'
			]);
			$pass=$request->input('txtPass');
			$user->password=Hash::make($pass);
		}
		$user->level=$request->rdoLevel;
		$user->email=$request->txtEmail;
		$user->remember_token=$request->input('remember_token');
		$user->save();
		return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Sửa thành công']);
  }



}

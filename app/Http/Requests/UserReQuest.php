<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserReQuest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'txtUser'=>'required|unique:users,username',
			'txtPass'=>'required',
			'txtRePass'=>'required|same:txtPass',
			'txtEmail'=>'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/'
		];
	}
	public function message(){
		return [
			'txtUser.required'=>'Chưa nhập tên tài khoản',
			'txtUser.unique'=>'Tên đăng nhập đã tồn tại',
			'txtPass.required'=>'Chưa điền mật khẩu',
			'txtRePass.required'=>'Chưa nhập lại mật khẩu',
			'txtRePass.same'=>'Mật khẩu nhập lại không đúng',
			'txtEmail.required'=>'Chưa nhập Email',
			'txtEmail.regex'=>'Email nhập chưa đúng'
		];
	}

}

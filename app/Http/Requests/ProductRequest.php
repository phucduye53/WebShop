<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
			'parent'=>'required',
			'txtName'=>'required|unique:products,name',
			'fImages'=>'required|image'
		];
	}
	public function messages(){
		return[
			'parent.required'=>'Chưa chọn loại hàng hóa',
			'txtName.required'=>'Chưa có tên cho sản phẩm',
			'txtname.unique'=>'Đã tồn tại tên sản phẩm này',
			'fImages.required'=>'Hãy chọn hình ảnh cho sản phẩm',
			'fImages.image'=>'Phải tải tập tin là hình ảnh'
		];
	}

}

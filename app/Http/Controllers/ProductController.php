<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\product;
use App\cate;
use App\Http\Requests\ProductRequest;
use Input,File;
use App\ProductImages;
use Request;
use Auth;
class ProductController extends Controller {
		public function getList(){
			$data=Product::select('id','name','price','cate_id','created_at')->orderBy('id','DESC')->get()->toArray();
			return view('admin.product.list',compact('data'));
		}

	public function getAdd(){
    $cate = Cate::where('parent_ind',0)->get();
    return view('admin.product.add',['cate'=>$cate]);
  }
  public function postAdd(ProductRequest $product_request){
      $file_name=$product_request->file('fImages')->getClientOriginalName();
      $product =new Product;
      $product->name=$product_request->txtName;
      $product->alias=changeTitle($product_request->txtName);
      $product->price=$product_request->txtPrice;
      $product->intro=$product_request->txtIntro;
      $product->content=$product_request->txtContent;
      $product->image=$file_name;
      $product->keywords=$product_request->txtKeywords;
      $product->description=$product_request->txtDescription;
      $product->user_id=Auth::user()->id;
      $product->cate_id=$product_request->subcate;
      $product_request->file('fImages')->move('resources/upload',$file_name);
      $product->save();
			$product_id=$product->id;
			if(Input::hasFile('fProductDetail')){
				foreach(Input::file('fProductDetail')as $file){
					$product_img=new ProductImages();
					if(isset($file)){
						$product_img->image=$file->getClientOriginalName();
						$product_img->product_id=$product_id;
						$file->move('resources/upload/detail/',$file->getClientOriginalName());
						$product_img->save();
					}
				}
			}
			return redirect()->route('admin.product.list')->with(['flash_message'=>'Thêm thành công']);
  }
	public function getDelete($id){
		$product_detail= Product::find($id)->pimage->toArray();
		foreach ($product_detail as $value){
			File::delete('resources/upload/detail/'.$value["image"]);
		}
		$product=Product::find($id);
		File::delete('resources/upload/'.$product->image);
		$product->delete($id);
		return redirect()->route('admin.product.list')->with(['flash_message'=>'Xóa thành công']);
	}

	public function getEdit($id){
		$cate=Cate::where('parent_ind', 0)->get();
		$product =Product::find($id);
		$product_image=Product::find($id)->pimage;
		return view('admin.product.edit',compact('cate','product','product_image'));
	}
	public function postEdit($id,Request $request){
		$product =Product::find($id);
		$product->name=Request::input('txtName');
		$product->alias=changeTitle(Request::input('subcate'));
		$product->price=Request::input('txtPrice');
		$product->intro=Request::input('txtIntro');
		$product->content=Request::input('txtContent');
		$product->keywords=Request::input('txtKeywords');
		$product->description=Request::input('txtDescription');
		$product->user_id=Auth::user()->id;
		$product->cate_id=Request::input('subcate');
		$img_current ='resources/upload/'.Request::input('img_current');
		if(!empty(Request::file('fImages'))){
			$file_name=Request::file('fImages')->getClientOriginalName();
			$product->image=$file_name;
			Request::file('fImages')->move('resources/upload/',$file_name);
			if(File::exists($img_current)){
				File::delete($img_current);
			}
		}else {
			echo "k có";
		}
		$product->save();

		if(!empty(Request::file('fEditDetail'))){
			foreach(Request::file('fEditDetail')as $file  ){
				$product_img = new ProductImages();
				if(isset($file)){
					$product_img->image=$file->getClientOriginalName();
					$product_img->product_id = $id;
					$file->move('resources/upload/detail/',$file->getClientOriginalName());
					$product_img->save();
				}
			}
		}
		return redirect()->route('admin.product.list')->with(['flash_message'=>'Sửa thành công']);

	}
	public function getDelImg($id){
		if(Request::ajax()){
			$idHinh=(int)Request::get('idHinh');
			$image=ProductImages::find($idHinh);
			if(!empty($image_detail)){
				$img='resources/upload/detail/'.$image_detail->image;
				if(File::exists($img)){
					File::delete($img);
				}
				$image_detail->delete();
			}
			return "Oke";
		}
	}


}

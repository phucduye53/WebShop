<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Cate;

class CateController extends Controller {

	public function getAdd(){
		$parent=Cate::select('id','name','parent_ind')->get()->toArray();
    return view('admin.cate.add',compact('parent'));
  }
  public function postAdd(CateRequest $request){
    $cate = new cate;
    $cate->name=$request->txtCateName;
    $cate->alias=changeTitle($request->txtCateName);
    $cate->order=$request->txtOrder;
    $cate->parent_ind=$request->sltParent;
    $cate->keywords=$request->txtKeyword;
    $cate->description=$request->txtDescription;
    $cate->save();
    return redirect()->route('admin.cate.list')->with(['flash_message'=>'Thêm thành công']);
  }
  public function getList(){
		$data=Cate::select('id','name','parent_ind')->orderBy('id','DESC')->get()->toArray();
    return view('admin.cate.list',compact('data'));
  }

	public function getDelete($id){
			$parent = Cate::where('parent_ind',$id)->count();
			if($parent==0)
			{
				$cate = Cate::find($id);
				$cate->delete($id);
				return redirect()->route('admin.cate.list')->with(['flash_message'=>'Xóa thành công']);
			}else {
				echo "<script type='text/javascript'>
				alert('Không thể xóa loại hàng này ');
				window.location='";
						echo route('admin.cate.list');
				echo"'
				</script>";
			}
	}
	public function getEdit($id){
			$data =Cate::findOrFail($id)->toArray();
			$parent=Cate::select('id','name','parent_ind')->orderBy('id','DESC')->get()->toArray();
			return view('admin.cate.edit',compact('parent','data','id'));
	}
	public function postEdit(Request $request,$id){
		$this->validate($request,
		["txtCateName"=>"required"],
		["txtCateName.required"=>"Nhập vào tên loại hàng"]
	);
	$cate=Cate::find($id);
	$cate->name=$request->txtCateName;
	$cate->alias=changeTitle($request->txtCateName);
	$cate->order=$request->txtOrder;
	$cate->parent_ind=$request->sltParent;
	$cate->keywords=$request->txtKeyword;
	$cate->description=$request->txtDescription;
	$cate->save();
	  //return redirect()->route('admin.cate.list')->with(['flash_message'=>'Sửa thành công']);
		return redirect('admin/cate/edit/'.$id)->with(['flash_message'=>'Sửa thành công']);
	}

}

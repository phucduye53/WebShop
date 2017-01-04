<?php namespace App\Http\Controllers;
use DB,Cart;
use App\Http\Requests\UserReQuest;
use App\User;
use App\Http\Requests;
use Hash;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\LRequest;
use Stripe\Stripe;
use Stripe\Charge;
use Session;
use Stripe\customer;
use Stripe\Token;
use App\Order;
use App\Review;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$product=DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->skip(0)->take(4)->get();
		return view('user.pages.home',compact('product'));
	}
	public function loaisanpham($id){
		$product_cate=DB::table('products')->select('id','name','image','price','alias','cate_id')->where('cate_id',$id)->paginate(6);
		$cate=DB::table('cates')->select('parent_ind')->where('id',$product_cate[0]->cate_id)->first();
		$menu_cate =DB::table('cates')->select('id','name','alias')->where('parent_ind',$cate->parent_ind)->get();
		$lasted_product=DB::table('products')->select('id','name','image','price','alias')->orderBy('id','DESC')->take(3)->get();
		return view('user.pages.category',compact('product_cate','menu_cate','lasted_product','name_cate'));
	}
	public function chitietsanpham($id){
		$product_detail =DB::table('products')->where('id',$id)->first();
		$images = DB::table('product_images')->select('id','image')->where('product_id',$product_detail->id)->get();
		$product_cate=DB::table('products')->where('cate_id',$product_detail->cate_id)->where('id','<>',$id)->take(4)->get();
		$product_review=DB::table('reviews')->where('id_product',$product_detail->id)->paginate(1);
		if($product_review==null)
		{
					return view('user.pages.product',compact('product_detail','images','product_cate'));
		}else{
					return view('user.pages.product',compact('product_detail','images','product_cate','product_review'));
		}
	}
	public function muahang($id){
		$product_buy =DB::table('products')->where('id',$id)->first();
		Cart::add(array('id'=>$id,'name'=>$product_buy->name,'qty'=>1,'price'=>$product_buy->price,'options'=>array('img'=>$product_buy->image)));
		$content=Cart::content();
		return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Thêm thành công sản phẩm vào giỏ hàng']);
	}
	public function giohang(){
		$content=Cart::content();
		$total=Cart::total();
		return view('user.pages.shopping-cart',compact('content','total'));
	}
	public function xoasanpham($id){
		Cart::remove($id);
		return redirect()->route('giohang');
	}
	public function capnhat(){
		if(Request::ajax()){
			$id=Request::get('id');
			$qty=Request::get('qty');
			Cart::update($id,$qty);
			echo "oke";
		}
	}
	public function checkout(){
		$content=Cart::content();
		$total=Cart::total();
		return view('user.pages.checkout',compact('content','total'));
	}
	public function dangky(){
		return view('user.pages.register');
	}
	public function postAdd(Request $request){
		$this->validate($request,[
			'txtUser'=>'required|unique:users,username',
			'txtPass'=>'required',
			'txtRePass'=>'required|same:txtPass',
			'txtEmail'=>'required|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9-][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/'
		],['txtUser.required'=>'Chưa nhập tên tài khoản',
					'txtUser.unique'=>'Tên đăng nhập đã tồn tại',
					'txtPass.required'=>'Chưa điền mật khẩu',
					'txtRePass.required'=>'Chưa nhập lại mật khẩu',
					'txtRePass.same'=>'Mật khẩu nhập lại không đúng',
					'txtEmail.required'=>'Chưa nhập Email',
					'txtEmail.regex'=>'Email nhập chưa đúng']);
		$user=new User([
			'username'=>$request->input('txtUser'),
			'password'=>hash::make($request->input('txtPass')),
			'email'=>$request->input('txtEmail'),
			'level'=>2,
			'remember_token'=>$request->input('_token')
		]);
		$user->save();
		return redirect()->route('index');
	}
	public function profile(){
		//$orders=DB::table('orders')->where('user_id',Auth::user()->id)->get();
		//foreach($orders as $order){
			//	$order->cart=unserialize($order->cart);
		//	}
		//return view('user.pages.profile',compact('orders'));
		$data=User::find(Auth::user()->id);
		return view('user.pages.profile',compact('data'));
	}
	public function postprofile(Request $request){
		$user=User::find(Auth::user()->id);
		$this->validate($request,[
				'txtRePass'=>'same:txtPass'
			],[
				'txtRepass.same'=>'Nhập lại mật khẩu không đúng'
			]);
			if(!Hash::check($request->input('txtOldPass'),$request->input('txtReOldPass')))
			{
				return redirect()->route('profile')->with(['flash_level'=>'danger','flash_message'=>'Mật khẩu cũ không đúng']);
			}else{
				$pass=$request->input('txtPass');
				$user->password=Hash::make($pass);
				$user->email=$request->txtEmail;
				$user->remember_token=$request->input('remember_token');
				$user->save();
				return redirect()->route('profile')->with(['flash_level'=>'danger','flash_message'=>'Sửa thành công']);
				}
  }
	public function postdangnhap(LRequest $request){
			$login =[
				'username'=>$request->txtUser,
				'password'=>$request->txtPass
			];
			if(auth::attempt($login)){
				return redirect()->route('checkout');
			}else{
				return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Tài khoản hoặc mật khẩu không đúng']);
			}
		}

		public function getdangnhap(){
			return view('user.login');
		}
		public function postcheckout(Request $request){
				if(!Session::has('cart')){
					return redirect()->route('giohang');
				}
				$cart =new Cart($oldCart);
				$total=Cart::total();
				Stripe::setApiKey('sk_test_skgC7MpIRHbahfjeOQ9Kjp8P');
				try{
					$charge = Charge::create(array(
						"amount" => $total,
   					"currency" => "usd",
   					"source" => $request->input('stripeToken'), // obtained with Stripe.js,
   					"metadata" => array("order_id" => "6735")
					));
					$order =new Order();
					$order->payment_id=$charge->id;
					$order->user_id=Auth::user()->id;
					$order->total=Cart::total();
					$order->save();
				}catch(\Exception $e){
					return redirect()->route('checkout')->with('error',$e->getMessage());
				}
				Session::forget('cart');
				return redirect()->route('index')->with(['flash_level'=>'danger','flash_message'=>'Mua thành công']);
		}
		public function search(Request $request){
				$data=$request->input('search');
				$product_cate= DB::table('products')->where('name','like','%'.$data.'%')->paginate(6);
				return view('user.pages.search',compact('product_cate'));
		}
		public function addReview(Request $request){
			$this->validate($request,[
					'username'=>'required',
					'text'=>'required'
				],[
					'username.required'=>'Chưa nhập tên người dùng',
					'text.required'=>'Chưa nhập bình luận',
				]);
				$review = new Review();
				$review->id_product=$request->id;
				$review->text=$request->text;
				$review->username=$request->username;
				$review->save();
				return redirect()->back()->with(['flash_level'=>'danger','flash_message'=>'Thêm bình luận thành công']);
		}
}

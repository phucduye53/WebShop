<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller {
	public function getList(){
		$data=Order::select('id','created_at','user_id','payment_id','total')->get()->toArray();
		return view('admin.order.list',compact('data'));
	}
}

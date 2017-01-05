<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cate;
use Illuminate\Http\Request;

class Ajaxcontroller extends Controller {

	public function getsubcate($idp){
		$idparent = Cate::where('parent_ind', $idp)->get();
		foreach($idparent as $val)
		{
				echo "<option value='".$val->id."'>".$val->name."</option>";
		}
	}

}

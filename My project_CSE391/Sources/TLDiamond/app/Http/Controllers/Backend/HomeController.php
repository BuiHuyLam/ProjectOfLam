<?php 
namespace app\Http\Controllers\Backend;

use App\Http\Controllers\BackController;


/**
* 
*/
class HomeController extends BackController
{
	public function index(){
		return view('home.index');
	}	
}

?>





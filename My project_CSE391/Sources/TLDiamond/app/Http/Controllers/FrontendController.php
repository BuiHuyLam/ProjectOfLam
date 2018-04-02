<?php 
namespace App\Http\Controllers;

use View; 
use Auth;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Category;
use App\Models\Products;
use App\Helper\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\contact;
use App\Models\banner;
/**
 * summary 
 */
class FrontendController extends Controller
{
    /**
     * summary
     */
    public function __construct(){
        $cats = Category::where('status',1)->get();
        
        View::share([ 
            'cats' => $cats
        ]);
    }
    
    public function index(Cart $cart)
    {
        return view('frontend.index',[
            'cats'=>Category::all(),
            'cart'=> $cart
        ]);
    }

    public function about(Cart $cart){
        return view('frontend.about',[
            'cart'=> $cart
        ]);
    }

    public function contact(Cart $cart){
        return view('frontend.contact',[
            'cart'=> $cart
        ]);
    }

    public function postContact(Request $request){
        $this->validate($request,[
            'name' => 'required', 
            'email' => 'required',
            'content' => 'required'
        ],[
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Nhập địa chỉ email',
            'content.required' => 'Nhập nội dung phản hồi'
        ]);
        if(contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'content' => $request->content
        ])){
            return redirect()->route('home')->with('success','Gửi liên hệ thành công ...');
        }
        return redirect()->back()->with('error','Gửi liên hệ không thành công');
        
    }

    public function product($slug,Cart $cart){
        $pro = Products::where('slug',$slug)->first();
        $pro_ace = Products::where('cat_id',$pro->cat_id)->where('id','<>',$pro->id)->limit(3)->orderBy('updated_at','DESC')->get();
        if($pro){
            return view('frontend.product',[ 
                'product'=>$pro,
                'cart'=> $cart,
                'pro'=>$pro_ace
            ]);
        }
    }
    public function category($id,Cart $cart){
        $pro = Products::Where(['status'=>1,'cat_id'=>$id])->orderBy('id','DESC')->paginate(12);
        $cate = Category::where('id',$id)->get()->toArray();
        return view('frontend.category',[
            'pro'=>$pro,
            'cats'=> Category::where('parent','0')->get(),
            'cart'=> $cart,
            'cate' => $cate
        ]);
    }

    public function categoryParent($id,Cart $cart){
        $cats = Category::find($id);
        $cs = $cats->childs->toArray();
        $childs = [];
        if(count($cs)) {
            foreach($cs as $c){
                $childs[] = $c['id'];
            }
        }
        array_push($childs,$id);
        // dd($childs);
        $cate = Category::where('id',$id)->get()->toArray();
        $pro = Products::Where('status',1)->whereIn('cat_id',$childs)->orderBy('id','DESC')->paginate(12);
        
       
        return view('frontend.category',[
            'pro'=>$pro,
            'cart'=> $cart,
            'cats'=> Category::where('parent','0')->get(),
            'cate' => $cate
        ]);
    }

    public function sale(Cart $cart){
        return view('frontend.sale',[
            'cart'=> $cart, 
            'cats'=> Category::where('parent','0')->get(),
            'cat'=>Category::all(),
        ]);
    }

    public function add_cart($id, Cart $cart){
        $product = Products::find($id)->toArray();
        $cart->add($product);
        return redirect()->route('view-cart')->with('success','Đã thêm vào giỏ hàng');
    }

    public function add_cart_quick($id, Cart $cart){
        $product = Products::find($id)->toArray();
        $cart->add($product);
        // return redirect()->back();
        echo "ok";
    }

    public function view_cart(Cart $cart){
        // dd($cart);
        return view('frontend.view-cart',[
            'cart'=> $cart
        ]);
    }

    public function remove($id, Cart $cart){
        $cart->remove($id);
        $pro = Products::find($id);
        return redirect()->route('view-cart')->with('success','Đã xóa '.$pro->name.' khỏi giỏ hàng');
    }

    public function clear(Cart $cart){
        $cart->clear();
        return redirect()->route('view-cart')->with('success','Xóa giỏ hàng thành công');
    }

    public function update(Cart $cart,Request $request){
        $quantity = $request->quantity ? $request->quantity : 1;
        if($request->id){
            $cart->update($request->id,$quantity);
            return redirect()->route('view-cart')->with('success','Cập nhật thành công');
        }
    }

    public function order(Cart $cart){
        
        return view('frontend.order',[
           'cart' =>$cart 
        ]);
    }
      public function post_order(Cart $cart, Request $request)
      {
        
        if(!empty($cart->items)){
            if($order = Order::create([
                'amount'=> $cart->total(),
                'cus_id' => Auth::user()->id,
                'status' => 0,
                'full_name'=>$request->full_name,
                'email' =>$request->email,
                'phone' =>$request->phone,
                'address'=> $request->addresss,
                'note'=>$request->note,
                'receiver_name'=>$request->receiver_name,
                'receiver_phone'=>$request->receiver_phone,
                'receiver_add'=>$request->receiver_add
            ]))
            {
                foreach($cart->items as$item){
                    Order_detail::create([
                        'order_id' =>$order->id,
                        'pro_id' =>$item['id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'price_sale' => $item['price_sale'],
                    ]);
                }
                session(['cart'=>[]]);
                return redirect()->route('home')->with('success','Đặt hàng thành công');
            };
       }
       else{
        return redirect()->route('error')->with('message','Đặt hàng thất bại');
       }
    }

    public function history_order(Cart $cart){
        $order = Order::where('cus_id',Auth::user()->id)->get();
        return view('frontend.history_order',[
           'cart' =>$cart,
           'order' =>$order
        ]);
    }

    public function history_delete($id){
        $order = Order::destroy($id);
        $order_detail = Order_detail::Where('order_id',$id)->delete();
        return redirect()->route('history-order');
    }
    
    /*đăng nhập*/
    public function login(Cart $cart){
        return view('frontend.login',[
            'cart'=> $cart
        ]);
    }

    public function post_login(Request $request){
       $this->validate($request,[
            'email' =>'required|email',
            'password' =>'required',
       ]);

       if (Auth::attempt($request->only('email','password'),$request->has('remember'))) {
            return redirect()->route('home')->with('success','Chào mừng '.Auth::user()->username.' trở lại');
       }else{
        return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không đúng');
       }
    }

    public function logout(){

        Auth::logout();

        return redirect()->route('home');
    }
    //đăng ký
    public function registrater(Cart $cart){
        return view('frontend.registrater',[
            'cart'=> $cart
        ]);
    }
    public function post_registrater(Request $request){
        $this->validate($request,[
            'username' => 'required', 
            'password' => 'required',
            'password_rp'=> 'same:password',
            'address' => 'required',
            'phone' => 'required|min:9|max:10',
            'email'=> 'required|email|unique:user,email'
        ],[
            'username.required'=> 'Vui lòng nhập tên',
            'password.required'=> 'Nhập mật khẩu',
            'password_rp.same'=> 'Nhập lại mật khẩu không chính xác',
            'address.required'=> 'Vui lòng nhập địa chỉ',
            'phone.required'=> 'Vui lòng nhập số điện thoại',
            'email.required'=> 'Vui lòng nhập email',
            'email.unique'=> 'Email đã tồn tại',
            'email.email'=> 'Email không đúng',
            'phone.min'=> 'Số điện thoại không đúng',
            'phone.max'=> 'Số điện thoại không đúng'
        ]);
        $groups = 'customer';
        $status = 1;
        if(User::create([
            'username' => $request->username,
            'email' => $request->email,
            'groups' => $groups,
            'password' => bcrypt($request->password),
            'phone'=> $request->phone,
            'address'=>$request->address,
            'status'=> $status
        ]))
        return redirect()->route('home')->with('success','Tạo tài khoản thành công');

    }

    public function error(Cart $cart){

        return view('frontend.erro',[
            'cart'=> $cart
        ]);
    }


    public function search_pro(Request $request,Cart $cart){
        $pro = Products::where('name','like','%'.$request->search_key.'%')->paginate(12);
        return view('frontend.seach_pro',[
            'pro'=>$pro,
            'cart'=>$cart
        ]);
    }
}

?>
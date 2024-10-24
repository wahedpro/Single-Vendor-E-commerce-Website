<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;





class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function home(){
        $product = Product::all();

        if(Auth::id()){
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        }

        return view('home.index',compact('product','count'));
        
    }

    public function login_home(){
        $product = Product::all();
        
        if(Auth::id()){
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        }

        return view('home.index',compact('product','count'));
    }

    public function product_details($id){

        $data = Product::find($id);

        if(Auth::id()){
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }else{ 
            $count = '';
        }
        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id){
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;  

        $data = new Cart;

        $data->user_id = $user_id;
        $data->product_id = $product_id;

     

        $data->save();
        

        return redirect()->back();
    }


    public function mycart(){

        if(Auth::id()){
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }
        return view('home.mycart',compact('count','cart'));
    }

    public function delete_cart($id){
        $data  = Cart::find($id);
        $data -> delete();

        return redirect()->back();
    }

    public function confirm_order(Request $request){

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;
        $cart = Cart::whare('user_id',$userid)->get();

        foreach($cart as $carts){
            $order = new Order;

            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;

            $order->save();

            return redirect()->back();
        }

        
    }

    public function shop(){
        $product = Product::all();

        if(Auth::id()){
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        }

        return view('home.shop',compact('product','count'));
        
    }

    public function why(){
     

        if(Auth::id()){
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        }

        return view('home.why',compact('count'));
        
    }

    public function testimonial(){
     

        if(Auth::id()){
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        }

        return view('home.testimonial',compact('count'));
        
    }


    public function contact(){
     

        if(Auth::id()){
            $user = Auth::user();

            $userid = $user->id;

            $count = Cart::where('user_id',$userid)->count();
            
        }else{
            $count = '';
        }

        return view('home.contact',compact('count'));
        
    }
}

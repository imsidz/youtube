<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class HomeController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function post(Request $request ){
        
        // $carts = Session::get('cart', []);
        Session::push('channel', $request->title);
        // dd(Session::get('channel'));
        // Session::forget('cart');
        // foreach ($carts as $cart) {
        //     if ($cart == 'LPpoD') {
        //         echo 'LPpoD';
        //     }
        //     else{
        //         Session::push('cart', str_random(5));
        //     }
        // }
        // if () {
        //     dd(Session('cart')); 
        // }else{
        //     echo "Unique";
        // }
        // Session::push('cart', '2MxXq');
        // $product = collect([1,2,3,4]);
        // Session::push('cart', $product);

        return back();
    }

    public function welcome (){

        // $collection = collect(['name' => 'Desk', 'price' => 100]);
        // Session::flush();
        // Session::push('cart', 4);
        
        // if (Session::get('cart')->contains('3')) {
            
        // }
        // else{
        //     echo "false";
        // }
        // dd(Session::get('channel'));
        return view('welcome');
    }
}

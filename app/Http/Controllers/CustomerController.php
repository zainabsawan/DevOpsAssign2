<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

// MODELS
use App\Models\Customer;
use App\Models\Admin;
use App\Models\ProductModel;
use App\Models\Order;

class CustomerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function showLoginForm()
    {
        return view('login');
    }

    public function showSignupForm()
    {
        return view('signup');
    }


    public function signup(Request $request){

        $customer = new Customer();

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',

        ]);

        $customer->Name = $request['name'];
        $customer->Email = $request['email'];
        $customer->Password = $request['password'];
        $customer->Phone = $request['phone'];
        $customer->Address = $request['address'];
        $customer->save();
        return redirect()->route('login')->with('message', 'Successfully registered');

    }

    public function login(Request $request){

        if ($request->isMethod('post')){
            $email = $request->input('email');
            $password = $request->input('password');

            $customers = Customer::where('Email', $email)->where('Password', $password);

            if($customers->exists()){
                $customer = $customers->first();
                $request->session()->put('customer_id', $customer->id);
                $request->session()->put('customer_name', $customer->Name);
                $request->session()->put('customer_email', $customer->Name);
                // $request->session()->put('customer_name', $customer->Name);

                return redirect()->route('profile');
            }

            return redirect()->route('login')->with('error', 'Invalid credentials');

        }
    }

    public function logout(Request $request){
        //logger('Before logout: ' . print_r(session()->all(), true));
        $request->session()->forget('customer_id');
        $request->session()->forget('customer_email');
        $request->session()->forget('customer_name');
        //logger('After logout: ' . print_r(session()->all(), true));

        return redirect('login')->with('error', 'Logged out');
    }

    public function profile(Request $request){
        if ($request->session()->has('customer_id')){
            $orders = Order::where('customerId', $request->session()->get('customer_id'))->get();
            $customer = Customer::where('id', $request->session()->get('customer_id'))->first();
            //logger('customer name: ' . print_r(session()->all(), true));
            return view('customerProfile', ['orders'=> $orders, 'customer' => $customer ] );
        }
        return redirect('login')->with('error', 'Login Required');
    }

    // BUY PAGE
    public function showBuyPage() {

        $productModel = new ProductModel();

        $cateogory = ["Indoor","Outdoor","Succulents","Flower"];
        $products = [];
        for($i = 0; $i < count($cateogory); $i++){
            $products[$i] = $productModel->getProductByCategory($cateogory[$i]);
        }

        return view('buy', ['products' => $products]);
    }

    public function searchProduct($term) {
        // $product = ProductModel::where('Name', 'like', '%' . $term . '%')->take(3)->get(['Name']);
        $product = ProductModel::where('Name', 'like', "$term%")->take(3)->get();
        return $product;
    }

    public function checkout(Request $request){
        if ($request->session()->has('customer_id')){
            $customerId = $request->session()->get('customer_id');
            $customer = Customer::find($customerId);
        }
        else{
            $customer = null;
            return view('checkout');
        }

        return view('checkout' , ['customer' => $customer]);
    }

    public function confirmOrder(Request $request) {
        // Get the data from the hidden input field

        $dataFromLocalStorage = $request->input('cart_data');

        $b = $request->input('baddress');
        $s = $request->input('saddress');

        // Your server-side logic here
        $order = new Order();
        $order->products = $dataFromLocalStorage;
        if( $s != null ){
            $order->shippingAddress = $s;
        }
        else{
            $order->shippingAddress = $b;
        }

        if ($request->session()->has('customer_id')){
            $customerId = $request->session()->get('customer_id');
            $order->customerId = $customerId;

            $customers = Customer::where( 'id', $customerId);
            $customer = $customers->first();
            $customer->ccName = $request->input('cc_name');
            $customer->ccNumber = $request->input('cc_number');
            $customer->ccExpiration = $request->input('cc_expiration');
            $customer->save();


        }

        // Save the order to the database or perform other actions
        $order->save();


        $carts = json_decode($dataFromLocalStorage, true);

        // $cartData = json_decode($_POST['cart'], true);
        //$cartData = json_decode( $request->input('cart'), true);
        //dd($cartData);
        // $carts = $cartData['cart'];

        // $requestBody = file_get_contents('php://input');
        // $cartData = json_decode($requestBody, true);
        // $carts = $cartData['cart'];
        $customerCart = [[]];
        foreach ($carts as $usercart ){
            if ($usercart[0] == 0){
                $customerCart = $carts[0];
            }
            else if ($usercart[0] == $customerId){
                $customerCart = $usercart;
            }
        }
        // [ 1 , [pid, pname, pprice, pqty ]]

        // foreach( $customerCart as $item ){
        //     if( is_int($item) ){
        //         continue;
        //     }
        //     $pid = $item[0];
        //     $product = ProductModel::find($pid);
        //     $stock = $product->Quantity;
        //     $qtyOrdered = $item[3];
        //     $product->Quantity = $stock - $qtyOrdered;
        //     $product->save();
        // }

        for ($i = 1; $i < count($customerCart); $i++) {

            $pid = $customerCart[$i][0];
            $product = ProductModel::find($pid);
            $stock = $product->Quantity;
            $qtyOrdered = $customerCart[$i][3];
            $product->Quantity = $stock - $qtyOrdered;
            $product->save();

        }

        return redirect('buy');
     }

}

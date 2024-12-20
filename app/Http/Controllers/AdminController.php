<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;

// MODELS
use App\Models\VendorModel;
use App\Models\Admin;
use App\Models\ProductModel;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AdminController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function showLoginForm()
    {
        return view('adminLogin');
    }


    public function login(Request $request)
    {



        if ($request->isMethod('post')){
            $username = $request->input('username');
            $password = $request->input('password');

            $admins = Admin::where('Username', $username)->where('Password', $password);
            if($admins->exists()){
                $admin = $admins->first();
                $request->session()->put('admin_Id', $admin->admin_Id);
                $request->session()->put('Username', $admin->Username);
                return redirect()->intended('dashboard');
            }

            return redirect()->route('adminLogin')->with('error', 'Invalid credentials');

        }
    }

    public function logout(Request $request){
        $request->session()->forget('admin_Id');
        $request->session()->forget('Username');

        return redirect('adminLogin');
    }

    // View pages

    public function viewDashboard(Request $request) {
        if ($request->session()->has('admin_Id') && $request->session()->has('Username')){
            // $email = $request->session()->get('email');
            return view('dashboard', ['email' => session()->get('admin_Id'), 'name' => session()->get('Username')]);
        }
        else
            return redirect('adminLogin')->with('error', 'Login Required');
    }

    public function viewProducts(Request $request) {
        if ($request->session()->has('admin_Id') && $request->session()->has('Username')){
            $products = ProductModel::all();
            return view('products', ['products' => $products]);
        }
        else
            return redirect('adminLogin')->with('error', 'Login Required');
    }



    public function searchProduct($term) {
        // $product = ProductModel::where('Name', 'like', '%' . $term . '%')->take(3)->get(['Name']);
        $product = ProductModel::where('Name', 'like', "$term%")->take(10)->get();
        return $product;
    }



    public function viewAddProduct(Request $request) {

        if ($request->session()->has('admin_Id') && $request->session()->has('Username')){
            return view('addProduct', ['email' => session()->get('admin_Id'), 'name' => session()->get('Username')]);
        }
        else
            return redirect('adminLogin')->with('error', 'Login Required');
    }

    public function addProduct(Request $request) {

        if ($request->session()->has('admin_Id') && $request->session()->has('Username')){
            $product = new ProductModel();

            $request->validate([
                'productName' => 'required',
                'description' => 'nullable',
                'price' => 'required|numeric|min:0.01',
                'quantity' => 'required|integer|min:1',
                'category' => 'required',
                'mainImage' => 'required|image',
                'OtherImages.*' => 'nullable|image', // Apply image validation to each file in OtherImages
            ]);

            $product->Name = $request->input('productName');
            $product->Description = $request->input('description');
            $product->Price = $request->input('price');
            $product->Quantity = $request->input('quantity');
            $category = $request->input('category');
            $product->Category = implode(',', $category);

            $mainImage = $request->file('mainImage');
            $mainImageName = $mainImage->getClientOriginalName();
            $mainImage->move('uploads', $mainImageName);
            $product->MainImage = 'uploads/'.$mainImageName;

            $OtherImages = $request->file('OtherImages');

            if($OtherImages){
                $otherImagePaths = [];
                foreach($OtherImages as $image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('uploads', $imageName);
                    $otherImagePaths[] = 'uploads/'.$imageName;
                }
                $product->OtherImages = implode(',', $otherImagePaths);

            }

            $product->save();

            return redirect('products')->with('message', 'Product added successfully!');

        }

        else
            return redirect('adminLogin')->with('error', 'Login Required');
    }

    public function getProducts(Request $request) {
        $products = ProductModel::all();
        return redirect('products')->with('products', $products);
        // return return('viewdb', ['students' => $students]);
    }



    public function deleteProduct($id)
    {
        $product = ProductModel::find($id);
        if(!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }
        $product->delete();
        return redirect()->route('products')->with('message', 'Product deleted successfully!');
    }

    public function viewEditProduct(Request $request, $id){
        $product = ProductModel::find($id);
        if ($request->session()->has('admin_Id') && $request->session()->has('Username')){
            return view('editProduct',['product' => $product]);
        }
        else
            return redirect('adminLogin')->with('error', 'Login Required');
    }

    public function editProduct(Request $request, $id){
        if ($request->session()->has('admin_Id') && $request->session()->has('Username')){
            $product = ProductModel::find($id);
            $request->validate([
                'productName' => 'required',
                'description' => 'nullable',
                'price' => 'required|numeric|min:0.01',
                'quantity' => 'required|integer|min:1',
                'category' => 'required',
                'mainImage' => 'required|image',
                'OtherImages.*' => 'nullable|image',
            ]);

            $product->Name = $request->input('productName');
            $product->Description = $request->input('description');
            $product->Price = $request->input('price');
            $product->Quantity = $request->input('quantity');
            $category = $request->input('category');
            $product->Category = implode(',', $category);

            $mainImage = $request->file('mainImage');
            $mainImageName = $mainImage->getClientOriginalName();
            $mainImage->move('uploads', $mainImageName);
            $product->MainImage = 'uploads/'.$mainImageName;

            $OtherImages = $request->file('OtherImages');

            if($OtherImages){
                $otherImagePaths = [];
                foreach($OtherImages as $image) {
                    $imageName = $image->getClientOriginalName();
                    $image->move('uploads', $imageName);
                    $otherImagePaths[] = 'uploads/'.$imageName;
                }
                $product->OtherImages = implode(',', $otherImagePaths);

            }

            $product->save();

            return redirect('products')->with('message', 'Product edited successfully!');

        }

        else
            return redirect('adminLogin')->with('error', 'Login Required');

    }



}

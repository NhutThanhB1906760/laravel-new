<?php

// HomeController.php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        // $validator = Validator::make($input, $rules, $messages = [

        //     'required' => 'The :attribute field is required.',
        // ]);
        $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'image'=>'required'
        ]);
        $image = $request->file('image');
        $destinationPath = public_path('images'); // Đường dẫn thư mục lưu trữ ảnh

        // Tạo tên mới cho ảnh
        $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

        // Di chuyển ảnh vào thư mục đích
        $request->file('image')->move($destinationPath, $imageName);
        $name=$request->input('name');
        $des=$request->input('description');
        $namepath='images/'.$imageName;
        // DB::insert('insert into products (name,description,image) values (?, ?,?)', [$name,$des,$namepath]);
        $product=new Product;
        $product->name=$name;
        $product->description=$des;
        $product->image=$namepath;
        $product->save();
        echo "Add successful";
        // return response('Add successful', Response::HTTP_OK);
            // return redirect('/product');
            
        
    }
    public function getProduct(Request $request,$id){
        $results = DB::select('SELECT * FROM products WHERE id = ?', [$id]);
        return view('edit', ['data' => $results[0]]);
        dd($results);
    }
    public function updateProduct(Request $request,$id){
        if($request->hasFile('image')){
            // $filePath = DB::select('SELECT image FROM products WHERE id = ?', [$id]);
            // $imagePath = $filePath[0]->image;

            // if (Storage::delete('public/' . $imagePath)){
            //     dd('public/'.$filePath[0]->image);
            // }
            $image = $request->file('image');
            $destinationPath = public_path('images'); // Đường dẫn thư mục lưu trữ ảnh

        // Tạo tên mới cho ảnh
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();

        // Di chuyển ảnh vào thư mục đích
            $request->file('image')->move($destinationPath, $imageName);
            $namepath='images/'.$imageName;
            DB::table('products')
            ->where('id', $id)
            ->update(['name' => $request->input('name'),'description'=>$request->input('description'), 'image'=>$namepath]);
            dd($namepath);
        }
        else{
            DB::table('products')
            ->where('id', $id)
            ->update(['name' => $request->input('name'),'description'=>$request->input('description')]);
            return redirect()->back();
        }

    }

    public function getdata()
    {
        $products = Product::All();
        // dd($products);
        $data = DB::table('products')->get();

        return view('product', ['data' => $products]);
    }

    public function delete( $id)
    {    
        $filePath = DB::select('SELECT image FROM products WHERE id = ?', [$id]);
        $imagePath = $filePath[0]->image;

        Storage::delete('public/' . $imagePath);
        
        DB::table('products')->where('id', $id)->delete();

        return response('Delete successful', Response::HTTP_OK);    }

    public function login(Request $request)
    {
        $credentials = [
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ];
        // dd(bcrypt($request->input('password')));

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Làm mới session để tránh tấn công liên quan đến session

            // Lưu thông tin người dùng vào session
            $request->session()->put('user', Auth::user());
            return redirect('/');
    } else {
        // Đăng nhập thất bại
        return redirect()->back()->with('error', 'Invalid credentials');
    }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/form');
    }
    public function next()
    {
        return view('formProduct');
    }
   
}
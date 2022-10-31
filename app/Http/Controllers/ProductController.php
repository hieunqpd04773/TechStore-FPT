<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\CateItems;
use App\Models\Products;
use App\Models\ProVariants;

class ProductController extends Controller
{
    public function __construct()
    {
        $allPro=Products::all();
        view()->share('allPro', $allPro);
    }
    public function index()
    {
        $allCate = CateItems::all();
        $allPro = Products::all();
        $allPro1=Products::all();

        return view('admin.pages.products.index')->with(compact('allCate', 'allPro','allPro1'));
    }

    public function index5()
    {
        $keyword = $_GET['keywords_cate_id'];
        $allCate = CateItems::all();
        $allPro = Products::where('cate_id','=', $keyword)->get();
        $allPro1=Products::all();

        if(count($allPro)==0){
            $mess = 'Không tìm thấy kết quả!!!. Hiển thị tất cả sản phẩm.';
            $allPro=Products::all();
            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1','mess'));
        }else{
            $cate1 = CateItems::where('id','=', $keyword)->select('name')->get();
            $sub1 = subStr($cate1, 10);
            $str1 = strrev($sub1);
            $sub2 = subStr($str1, 3);
            $str2 = strrev($sub2);
            $mess = 'Lọc theo loại: '.$str2.'.';
            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1','mess','cate1'));
        }
    }
    public function index6()
    {
        $keyword = $_GET['keywords_pro_name'];
        $allCate = CateItems::all();
        $allPro = Products::where('name','=', $keyword)->get();
        $allPro1=Products::all();

        if(count($allPro)==0){
            $mess = 'Không tìm thấy kết quả!!!. Hiển thị tất cả sản phẩm.';
            $allPro=Products::all();
            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1','mess'));
        }else{
            $mess = 'Lọc theo tên: '.$keyword.'.';
            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1','mess'));
        }
    }

    public function index7()
    {
        $keyword = $_GET['keywords_price'];
        $allPro=Products::all();
        $allCate = CateItems::all();
        $allPro1=Products::all();

        if($keyword==0){
            $mess = 'Tất cả sản phẩm';
            $allPro=Products::all();
            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1','mess'));
        }
        else if($keyword==1){
            $mess = 'Sản phẩm giá dưới 1tr';
            $allPro=Products::where('price','<', 1000000)->get();
            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1', 'mess'));
        }
        else if($keyword==2){
            $mess = 'Sản phẩm giá từ 1tr đến 2tr';
            $allPro=Products::whereBetween('price',[1999900, 2000000])->get();

            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1', 'mess'));
        }
        else if($keyword==3){
            $mess = 'Sản phẩm giá từ 2tr đến 4tr';
            $allPro=Products::whereBetween('price',[2999900, 4000000])->get();

            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1', 'mess'));
        }
        else if($keyword==4){
            $mess = 'Sản phẩm giá từ 4tr đến 7tr';
            $allPro=Products::whereBetween('price',[4999900, 7000000])->get();

            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1', 'mess'));
        }
        else if($keyword==5){
            $mess = 'Sản phẩm giá từ 7tr đến 10tr';
            $allPro=Products::whereBetween('price',[7999900, 10000000])->get();

            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1', 'mess'));
        }
        else if($keyword==6){
            $mess = 'Sản phẩm giá từ 10tr đến 15tr';
            $allPro=Products::whereBetween('price',[99999900, 15000000])->get();

            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1', 'mess'));
        }
        else if($keyword==7){
            $mess = 'Sản phẩm giá từ 15tr đến 20tr';
            $allPro=Products::whereBetween('price',[14999900, 20000000])->get();

            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1', 'mess'));
        }
        else if($keyword==8){
            $mess = 'Sản phẩm giá trên 20tr';
            $allPro=Products::where('price','>',20000000)->get();

            return view('admin.pages.products.index')->with(compact('allCate', 'allPro', 'allPro1', 'mess'));
        }
    }

    
    public function createView()
    {
        $allCate=Categories::all();
        return view('admin.pages.products.create',['allCate'=>$allCate]);
    }
    public function loadCateItem(Request $request)
    {
        $allCateItems=CateItems::where('cate_id',$request->id_cate)->get();
        return response()->json($allCateItems);
    }
    public function create(Request $r)
    {
     
        $pro=new Products();

        if($r->has('file_upload')){
            $file=$r->file_upload;
            $file_name= date('YmdHi').$file->getClientOriginalName();
            //dd($file_name);
            $file->move(public_path('images/products'),$file_name);
        }
        $r->merge(['image'=>$file_name]);

        $pro->name=$r->name;
        $pro->cate_id=$r->cate_id;
        $pro->price=$r->price;
        $pro->discount=$r->discount;
        $pro->image=$r->image;
      // $pro->date=$r->date;
        $pro->quantity=$r->quantity;
        $pro->detail=$r->detail;
        $pro->hot=$r->hot;
        $pro->status=$r->status;
        $pro->save();

        if(isset($r->color)){
            $pro_var= new ProVariants();
            if($r->has('file_upload_variants')){
                $file=$r->file_upload_variants;
                $file_upload_variants= date('YmdHi').$file->getClientOriginalName();
                //dd($file_name);
                $file->move(public_path('images/products'),$file_upload_variants);
            }
            $r->merge(['image'=>$file_upload_variants]);

            $pro_var->pro_id=$pro->id;
            $pro_var->color=$r->color;
            $pro_var->memory=$r->memory;
            $pro_var->image=$r->file_upload_variants;
            $pro_var->price=$r->price;
            $pro_var->width=$r->width;
            $pro_var->hight=$r->hight;
            $pro_var->depth=$r->depth;
            $pro_var->weight=$r->weight;
            $pro_var->save();
        }

        toastr()->success('Thành công', 'Thêm sản phẩm thành công');
        return redirect(route('listPro'));

    }
    
    // Biến thể
    public function showVariants($id)
    {
        $pro=Products::find($id);
        $allCate=Categories::all();
        $pro_vars=ProVariants::where('pro_id','=',$id)->get();
        return view('admin.pages.products.variants',['pro'=>$pro,'allCate'=>$allCate,'pro_vars'=>$pro_vars]);
    }
    // public function loadAddVariant($id)
    // {
    //     $pro=Products::find($id);
    //     $allCate=Categories::all();
    //     return view('admin.pages.products.addvariant',['pro'=>$pro,'allCate'=>$allCate]);
    // }
    public function createVariant(Request $request)
    {
        $pro_var= new ProVariants();
        if($request->has('file_upload_var')){
            $file=$request->file_upload_var;
            $file_name= date('YmdHi').$file->getClientOriginalName();
            //dd($file_name);
            $file->move(public_path('images/products'),$file_name);
        }
        $request->merge(['image'=>$file_name]);

        $pro_var->pro_id=$request->id;
        $pro_var->color=$request->color;
        $pro_var->memory=$request->memory;
        $pro_var->price=$request->price;
        $pro_var->image=$request->image;
        $pro_var->width=$request->width;
        $pro_var->hight=$request->hight;
        $pro_var->weight=$request->weight;
        $pro_var->depth=$request->depth;
        $pro_var->save();

        toastr()->success('Thành công', 'Thêm biến sản phẩm thành công');
        return redirect(route('listPro'));
    }

    public function deleteVar($id)
    {
        $pro_var=ProVariants::find($id);
        $pro_id=$pro_var->pro_id;
        $pro_var->delete();

        $pro=Products::find($pro_id);
        $allCate=Categories::all();
        $pro_vars=ProVariants::where('pro_id','=',$pro_id)->get();

        return view('admin.pages.products.variants',['pro'=>$pro,'allCate'=>$allCate,'pro_vars'=>$pro_vars]);
        
    }
    public function loadEdit($id)
    {
        $pro=Products::find($id);
        $allCate=Categories::all();
        return view('admin.pages.products.edit',['pro'=>$pro,'allCate'=>$allCate]);
    }
    public function edit(Request $request)
    {
        $pro=Products::find($request->id);

        if($request->file_upload==''){
            $image=$request->input('image1');
        }
        else if($request->has('file_upload')){
            $file=$request->file_upload;
            $file_name= $file->getClientoriginalName();
            $file->move(public_path('images/products'),$file_name);
            $image=$file_name;
        }

        $pro->name=$request->name;
        $pro->cate_id=$request->cate_id;
        $pro->price=$request->price;
        $pro->discount=$request->discount;
        $pro->image=$image;
       // $pro->date=$request->date;
        $pro->quantity=$request->quantity;
        $pro->detail=$request->detail;
        $pro->hot=$request->hot;
        $pro->status=$request->status;
        $pro->save();
        toastr()->success('Thành công', 'Cập nhật sản phẩm thành công');
        return redirect(route('listPro'));
    }
    public function delete($id)
    {
        $pro=Products::find($id);
        $pro->delete();
        toastr()->success('Thành công', 'Xóa sản phẩm thành công');
        return redirect(route('listPro'));
    }
}

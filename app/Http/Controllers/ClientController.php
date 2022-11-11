<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\CateItems;
use App\Models\Products;
use App\Models\ProVariants;
use App\Models\Comments;
use App\Models\User;
use App\Models\UserAddress;
use DB;
use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    public function __construct()
    {
        $allCate=Categories::all();
        view()->share('allCate', $allCate);
    }
    public function index()
    {
        $homeTopPr = Products::where('hot','=','1')->limit(3)->get();
        $homeNewPr = Products::orderBy('id','desc')->limit(5)->get();
        $homeSalePr = Products::orderBy('discount','desc')->limit(6)->get();
        return view('client.pages.index',['homeTopPr'=>$homeTopPr,'homeNewPr'=>$homeNewPr,'homeSalePr'=>$homeSalePr]);
    }
    public function contact()
    {
        return view('client.pages.contact');
    }
    public function getProByCate($id)
    {
        $listPro=Categories::find($id)->Products;
        $cti_bar=Categories::find($id)->Cate_items;
        return view('client.pages.category',['listPro'=>$listPro,'cti_bar'=>$cti_bar]);
    }
    public function getProByCateItem($id)
    {
        $listPro=CateItems::find($id)->Products;
        $cti_bar=CateItems::where('cate_id','=',$id)->get();
        return view('client.pages.category',['listPro'=>$listPro,'cti_bar'=>$cti_bar]);
    }
    public function getProById($id)
    {
        $pro=Products::find($id);
        $pro->view=$pro->view+1;
        $pro->save();
        $images=Products::find($id)->Images;
        $pro_vars=Products::find($id)->ProVariants;
        $coutall = DB::table('comments')->where('pro_id','=',$pro->id)->count();
        $cout5 = DB::table('comments')->where('pro_id','=',$pro->id)->where('status', '=', 5)->count();
        $cout4 = DB::table('comments')->where('pro_id','=',$pro->id)->where('status', '=', 4)->count();
        $cout3 = DB::table('comments')->where('pro_id','=',$pro->id)->where('status', '=', 3)->count();
        $cout2 = DB::table('comments')->where('pro_id','=',$pro->id)->where('status', '=', 2)->count();
        $cout1 = DB::table('comments')->where('pro_id','=',$pro->id)->where('status', '=', 1)->count();
        
        if($coutall>0){
            $tong = ($cout5*5+$cout4*4+$cout3*3+$cout2*2+$cout1*1)/$coutall;
            $Round =  round($tong, 1);
            $comm = DB::table('comments')->join('users' , 'users.id', '=', 'comments.user_id')->select('comments.*', 'users.name')->where('pro_id','=',$pro->id)->get();
            return view('client.pages.product',['pro'=>$pro,'images'=>$images,'pro_vars'=>$pro_vars, 'comm'=>$comm, 'coutall'=> $coutall,'cout5'=> $cout5,'cout4'=> $cout4,'cout3'=> $cout3,'cout2'=> $cout2,'cout1'=> $cout1, 'Round'=>$Round]);
        }
        else{
            $comm = DB::table('comments')->join('users' , 'users.id', '=', 'comments.user_id')->select('comments.*', 'users.name')->where('pro_id','=',$pro->id)->get();
            return view('client.pages.product',['pro'=>$pro,'images'=>$images,'pro_vars'=>$pro_vars, 'comm'=>$comm, 'coutall'=> $coutall,'cout5'=> $cout5,'cout4'=> $cout4,'cout3'=> $cout3,'cout2'=> $cout2,'cout1'=> $cout1]);
        }
        
    }

    public function getCateItemByCate(Request $r)
    {
        $cateItems=CateItems::where('cate_id','=',$r->id_cate)->get();
        return response()->json($cateItems);
    }
    public function getVarItemByid(Request $r)
    {
        $pro_var=ProVariants::find($r->pv_id);
        return response()->json($pro_var);
    }
    public function signup()
    {
        return view('client.pages.register');
    }
    public function forgotpassword()
    {
        return view('client.pages.forgot_password');
    }
    public function manager()
    {
        return view('client.pages.manager');
    }
    public function useraddress()
    {
        $listAdr = UserAddress::all();
        return view('client.pages.useraddress')->with(compact('listAdr'));
    }
    public function addAddress(Request $r)
    {
        $adr = new UserAddress();
        $adr->user_id = $r->user_id;
        $adr->name = $r->name;
        $adr->phone = $r->phone;
        $adr->address = $r->address;
        $adr->role = $r->role;
        DB::update('update user_address set role = ?',[0]);

        $adr -> save();
        
        toastr()->success('Thành công', 'Thêm địa chỉ thành công');
        return redirect(route('useraddress'));
    }
    public function geteditAddress($id)
    {
        $adr=UserAddress::find($id);

        return view('client.pages.editaddress',['adr'=>$adr]);
    }
    public function editAddress(Request $r)
    {
        $adr=UserAddress::find($r->id);
        $adr->user_id = $r->user_id;
        $adr->name = $r->name;
        $adr->phone = $r->phone;
        $adr->address = $r->address;

        $adr->role = $r->role;
        DB::update('update user_address set role = ?',[0]);

        $adr -> save();
        
        toastr()->success('Thành công', 'Chỉnh sửa địa chỉ thành công');
        return redirect(route('useraddress'));
    }
    public function deleteAddress($id){
        $adr = UserAddress::find($id);
        $id =$adr->id;
        $adr->delete();
        toastr()->success('Thành công', 'Xoá địa chỉ thành công');
        return redirect('useraddress');
    }
    public function edit_profile()
    {
        return view('client.pages.edit_profile');
    }
    // Tìm kiếm
    public function search(){
        $listPro=CateItems::all();
        $cti_bar=Categories::all();
        $keywords = $_GET['keywords'];
        $listPro=Products::where('name','LIKE', '%'.$keywords.'%')
        ->orWhere('detail','LIKE', '%'.$keywords.'%')->get();
        if(count($listPro)==0){
            $listPro = Products::all();
            $MesSearch = 'Không tìm thấy kết quả của từ khóa: '.$keywords.'. Hiển thị danh sách sản phẩm:';
            return view('client.pages.category')->with(compact('listPro','cti_bar','keywords','listPro', 'MesSearch'));
        }else{
            $MesSearch = 'Kết quả của từ khóa: '.$keywords.'.';
            return view('client.pages.category')->with(compact('listPro','cti_bar','keywords','listPro', 'MesSearch'));
        }
    }

    //comment
    public function store($id, Request $request)
    {
        $pro_id = $id;
        $comment = new Comments();
        $product = Products::find($id);
        $comment->pro_id = $pro_id;
        $comment->user_id = Auth::user()->id;


        $comment->content = $request->content;

        if($request->rating_status > 0){
            $comment->status = $request->rating_status;
        }
        else{
            $comment->status = 5;
        }

        $comment->save();

        return redirect()->back();
    }
    public function store1($id, Request $request)
    {
        $allusern = User::where('id', '=', )->get;
        return redirect()->back();
    }
    
}

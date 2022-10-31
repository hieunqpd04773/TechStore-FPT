<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\CateItems;
use App\Models\Orders;
use App\Models\ProVariants;


class OrderController extends Controller
{
    public function __construct()
    {
        $allOrder=Orders::all();
        view()->share('allOrder', $allOrder);
    }
    public function index()
    {
        $allCate = CateItems::all();
        return view('admin.pages.orders.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Category;
use App\Subcategory;
use App\Item;
use App\Brand;
use App\Order;

class FrontendController extends Controller
{
    public function index()
    {
    	$categories=Category::all();

    	$topitems=Item::all()->random(3);
    	// $reviewitems=Item::all()->random(3);

    	// take => limit / latest() => DESC in query
    	$latestitems=Item::latest()->take(3)->get();

    	// for null
    	// $discountitems=Item::whereNotNull('discount')->take(3)->get();

    	// for 0
    	$discountitems=Item::where('discount','>','0')->take(3)->get();

    	// $promotionitems=Item::where('discount','>','0')->get();


    	return view('frontend.index',compact('categories','topitems','latestitems','discountitems'));
    }

    public function brand($id)
    {
    	$branditems=Item::where('brand_id',$id)->get();
    	$brand=Brand::find($id);

    	return view('frontend.brand',compact('branditems','brand'));
    }
    public function promotion()
    {
    	
    	$promotionitems=Item::where('discount','>','0')->paginate(3);
    	return view('frontend.promotion',compact('promotionitems'));
    }

    public function cart()
    {
        // $branditems=Item::where('brand_id',$id)->get();
        // $item=Item::all();

        return view('frontend.cart');
    }

    public function subcategory($id)
    {
        
        $subcategory = Subcategory::find($id);


        $category_id = $subcategory->category->id;
        $subcategories = Subcategory::where('category_id',$category_id)->get();

        $subcategoryitems = Item::where('subcategory_id',$id)->paginate(3);
        $latestitems = Item::latest()->take(3)->get();


        $count_result = Item::where('subcategory_id',$id)->count();

        return view('frontend.subcategory',compact('subcategoryitems','subcategory','count_result','latestitems','subcategories'));
    }
    public function detail($id)
    {
        // $itemdetails=Item::where('brand_id',$id)->get();
        $itemdetails=Item::find($id);

        return view('frontend.detail',compact('itemdetails'));
    }
    public function order(Request $request)
    {
        $carts=json_decode($request->data);
        $note=$request->note;
        $orderdate=Carbon::now();
        // uniqid => no repeat
        $voucherno=uniqid();

        $total=0;
        foreach ($carts as $row) {
            // ->price => price in localstorage
            $unitprice=$row->price;
            $discount=$row->discount;

            if($discount){
                $price=$discount;
            }else{
                $price=$unitprice;
            }
            $total+=$price*$row->qty;
        }
        $status='Order';

        $auth=Auth::user();
        $userid=$auth->id;

        $order=new Order;
        $order->orderdate=$orderdate;
        $order->voucherno=$voucherno;
        $order->total=$total;
        $order->note=$note;
        $order->status=$status;
        $order->user_id=$userid;
        $order->save();

        foreach ($carts as $value) {
            $itemid=$value->id;
            $qty=$value->qty;

            // ->items in order.php(model)items() , attach(for belongsToMany)=>save()
            $order->items()->attach($itemid,['qty'=>$qty]);
        }

        return response()->json([
            'status'=>'Order successfully created!'
        ]);
    }

    public function ordersuccess()
    {
        return view('frontend.ordersuccess');
    }
}

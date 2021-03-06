<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;
use App\Item;
use Validator;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::all();
        $result=ItemResource::collection($items);
        $message='Item retrieved successfully.';
        $status=200;
        $response=[
            'status'=>$status,
            'success'=>true,
            'message'=>$message,
            'data'=>$result,
        ];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:255|unique:items',
            'images'=>'required'
        ]);

        if ($validator->fails()) {
            $status=400;
            $message='Validation Error.';

            $response=[
                'status'=>$status,
                'success'=>false,
                'message'=>$message,
                'data'=>$validator->errors(),
            ];
            return response()->json($response);
        }
        else{
            $name=$request->name;
            // $photo=$request->photo;
            $unitprice = $request->unitprice;
            $discount = $request->discount;
            $description = $request->description;
            $brandid = $request->brandid;
            $subcategoryid = $request->subcategoryid;
            // $images=$request->images;
            $data=[];

            // FILE UPLOAD

            if ($request->hasfile('images')) 
            {
                $i=1;
                foreach($request->file('images') as $image)
                {
                    $imagename = time().$i.'.'.$image->extension();
                    $image->move(public_path('images/item'), $imagename);  
                    $imgname = 'images/item/'.$imagename;
                    array_push($data, $imgname);
                    $i++;
                    
                }
                // File Upload
                // $imageName=time().'.'.$images->extension();
                // $images->move(public_path('images/item'),$imageName);
                // $data='images/item/'.$imageName;
            }

            // Data Insert
            $codeno = "JPM-".rand(11111,99999);

            $item= new Item();
            $item->codeno = $codeno;
            // ->name => colname in table
            $item->name = $name;
            $item->photo = json_encode($data);
            $item->price = $unitprice;
            $item->discount = $discount;
            $item->description = $description;
            $item->subcategory_id = $subcategoryid;
            $item->brand_id = $brandid;
            $item->save();

            $status=200;
            $message='Item created successfully.';
            $result=new ItemResource($item);

            $response=[
                'success'=>true,
                'status'=>$status,
                'message'=>$message,
                'data'=>$result
            ];
            return response()->json($response);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Item::find($id);
        if(is_null($item)){
            #404
            $status=404;
            $message='Item not fount.';

            $response=[
                'status' => $status,
                'success'=>false,
                'message'=>$message
            ];
            return response()->json($response);
        }
        else{
            #200
            $status=200;
            $message='Item retrieved successfully.';
            $result=new ItemResource($item);
            $response=[
                'status' => $status,
                'success'=>true,
                'message'=>$message,
                'data'=>$result,
            ];
            return response()->json($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item=Item::find($id);

        $validator = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
        ]);

        if ($validator) {
            $name = $request->name;
            $unitprice = $request->unitprice;
            $discount = $request->discount;
            $description = $request->description;
            $brandid = $request->brandid;
            $subcategoryid = $request->subcategoryid;
            $codeno = $request->codeno;


            // FILE UPLOAD

            // if ($request->hasfile('images')) 
            // {

            //     $i = 1;
            //     foreach($request->file('images') as $file)
            //     {
            //         $name = time().$i.'.'.$file->extension();
            //         $file->move(public_path('images/item'), $name);  
            //         $data[] = 'images/item/'.$name;
            //         $i++;
            //     }

            //     foreach(json_decode($request->oldphoto) as $oldphoto){
            //         if(\File::exists(public_path($oldphoto))){
            //             \File::delete(public_path($oldphoto));
            //         }
            //     }
            // }else{
            //     $data = json_decode($request->oldphoto);
            // }
            // Data update
            $item->codeno = $codeno;
            $item->name = $name;
            // $item->photo = json_encode($data);
            $item->price = $unitprice;
            $item->discount = $discount;
            $item->description = $description;
            $item->subcategory_id = $subcategoryid;
            $item->brand_id = $brandid;
            $item->save();
            $item->save();

            $status=200;
            $result=new ItemResource($item);
            $message='Item update successfully.';
            $response=[
                'success'=>true,
                'status'=>$status,
                'message'=>$message,
                'data'=>$result
            ];
            return response()->json($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::find($id);
        if(is_null($item)){
            #404
            $status=404;
            $message='Item not fount.';

            $response=[
                'status' => $status,
                'success'=>false,
                'message'=>$message
            ];
            return response()->json($response);
        }
        else{
            #200
            foreach (json_decode($item->photo) as $oldphoto){
                if(\File::exists(public_path($oldphoto))){
                    \File::delete(public_path($oldphoto));
                }
            }
            $item->delete();

            $status=200;
            $message='Item deleted successfully.';

            $response=[
                'success'=>true,
                'status'=>$status,
                'message'=>$message
                
            ];
            return response()->json($response);
        }
    }
}

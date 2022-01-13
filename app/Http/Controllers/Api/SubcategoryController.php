<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\SubcategoryResource;
use App\Subcategory;
use Validator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories=Subcategory::all();
        $result=SubcategoryResource::collection($subcategories);
        $message='Subcategory retrieved successfully.';
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
            'name'=>'required|string|max:255|unique:subcategories',
            'categoryid' => 'required|numeric|min:0|not_in:0'
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
            $categoryid=$request->categoryid;

            // Data Insert
            $subcategory=new Subcategory;
            // ->name => colname in table
            $subcategory->name=$name;
            $subcategory->category_id=$categoryid;
            $subcategory->save();

            $status=200;
            $message='Subcategory created successfully.';
            $result=new SubcategoryResource($subcategory);

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
        $subcategory=Subcategory::find($id);
        if(is_null($subcategory)){
            #404
            $status=404;
            $message='Subcategory not fount.';

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
            $message='Subcategory retrieved successfully.';
            $result=new SubcategoryResource($subcategory);
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
        $subcategory=Subcategory::find($id);

        $name=$request->name;
        $categoryid=$request->categoryid;
        
        // Data update
        
        $subcategory->name=$name;
        $subcategory->category_id=$categoryid;
        $subcategory->save();

        $status=200;
        $result=new SubcategoryResource($subcategory);
        $message='Subcategory update successfully.';
        $response=[
            'success'=>true,
            'status'=>$status,
            'message'=>$message,
            'data'=>$result
        ];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory=Subcategory::find($id);
        if(is_null($subcategory)){
            #404
            $status=404;
            $message='Subcategory not fount.';

            $response=[
                'status' => $status,
                'success'=>false,
                'message'=>$message
            ];
            return response()->json($response);
        }
        else{
            #200
            $subcategory->delete();

            $status=200;
            $message='Subcategory deleted successfully.';

            $response=[
                'success'=>true,
                'status'=>$status,
                'message'=>$message
                
            ];
            return response()->json($response);
        }
    }
}

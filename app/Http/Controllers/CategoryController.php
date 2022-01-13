<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// for using model
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select * from categories
        $categories=Category::all();
        return view('backend.category.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->photo);
        // Validation
        $validator=$request->validate([
            'name' => ['required','string','max:255','unique:categories'],
            'photo' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        if($validator){

            // catch data from input type => ->name
            $name=$request->name;
            $photo=$request->photo;

            // File Upload
            $imageName=time().'.'.$photo->extension();
            $photo->move(public_path('images/category'),$imageName);
            $filePath='images/category/'.$imageName;

            // Data Insert
            $category=new Category;
            // ->name => colname in table
            $category->name=$name;
            $category->photo=$filePath;
            $category->save();
            return redirect()->route('backside.category.index')->with("successMsg",'New Category is ADDED in your data');
        }
        else{
            return redirect::back()->withErrors($validator);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('backend.category.edit',compact('category'));
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
        $name=$request->name;
        $newphoto=$request->photo;
        $oldphoto=$request->oldPhoto;
        // dd($name);
        if ($request->hasFile('photo')) {
            # file upload
            $imageName=time().'.'.$newphoto->extension();
            $newphoto->move(public_path('images/category'),$imageName);
            $filePath='images/category/'.$imageName;

            if (\File::exists(public_path($oldphoto))) {
                \File::delete(public_path($oldphoto));
            }
        }
        else{
            $filePath=$oldphoto;
        }
        // Data update
        $category=Category::find($id);
        $category->name=$name;
        $category->photo=$filePath;
        $category->save();

        return redirect()->route('backside.category.index')->with('successMsg','Existing Category is UPDATED in your data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $oldphoto=$category->photo;
        
        if(\File::exists(public_path($oldphoto))){
            \File::delete(public_path($oldphoto));
        }
        $category->delete();

        return redirect()->route('backside.category.index')->with('successMsg','Existing Category is DELETED in your data');
    }
}

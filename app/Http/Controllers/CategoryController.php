<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $cat= Category::all();
        return response()->json(['status'=>'success','message'=>'all categories loaded successfully',$cat]);

    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
           $validated =$request->validated();
        $cat=Category::create($validated);
        return response()->json(['status'=>"success","message'=>`category $cat->name created successfully",'data'=>$cat],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}

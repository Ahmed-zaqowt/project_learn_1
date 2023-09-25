<?php

namespace App\Http\Controllers\Admint\Category;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all() ;
        return view('admin.category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $request->validate([
           'name' => 'required' ,
           'parent' => 'nullable' ,
           'description' => 'required' ,
           'image' => 'required' ,
        ]);

        $nameimage = time() . '_' . rand() . '.' . $request->file('image')->getClientOriginalExtension() ;
        $request->file('image')->move(public_path('uploads') , $nameimage) ;

        Category::create([
            'name' => $request->name ,
            'slug' => Str::slug($request->name) ,
            'parent_id' => $request->parent ,
           'description' => $request->description ,
           'image' => $nameimage ,
        ]);

        $categories = Category::all() ;
        return view('admin.parts.list-categories' , compact('categories'))->render() ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

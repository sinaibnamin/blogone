<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::orderby('created_at','desc')->paginate(5);
      return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validatedData = $request->validate([
        'name' => 'required|unique:categories,name|max:255',
    ]);


    $category= Category::create([
      'name'=> $request->name,
      'slug'=> Str::slug($request->name, '-'),
      'description'=> $request->description,
    ]);
    return redirect('admin/category/create')->with('success', 'category created!');

    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
      $validatedData = $request->validate([
        'name' => "required|unique:categories,name,$category->id",
    ]);


      $category->name= $request->name;
      $category->slug= Str::slug($request->name, '-');
      $category->description= $request->description;
      $category->save();

    return redirect('admin/category/')->with('success', 'category updated!');

    }


    public function destroy(Category $category)
    {
      if ($category) {
        $category->delete();
      }
      return redirect()->route('category.index')->with('success', 'category deleted!');


    }
}

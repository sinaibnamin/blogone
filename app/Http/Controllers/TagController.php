<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{

    public function index()
    {
      $tags = tag::orderby('created_at','desc')->paginate(5);
      return view('admin.tag.index',compact('tags'));
    }


    public function create()
    {
          return view('admin.tag.create');
    }


    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'name' => 'required|unique:categories,name|max:255',
    ]);


    $tag= tag::create([
      'name'=> $request->name,
      'slug'=> Str::slug($request->name, '-'),
      'description'=> $request->description,
    ]);
    return redirect('admin/tag/create')->with('success', 'tag created!');

    }


    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
          return view('admin.tag.edit',compact('tag'));
    }


    public function update(Request $request, Tag $tag)
    {
      $validatedData = $request->validate([
        'name' => "required|unique:tags,name,$tag->id",
    ]);


      $tag->name= $request->name;
      $tag->slug= Str::slug($request->name, '-');
      $tag->description= $request->description;
      $tag->save();

    return redirect('admin/tag/')->with('success', 'tag updated!');

    }


    public function destroy(Tag $tag)
    {
      if ($tag) {
        $tag->delete();
      }
      return redirect()->route('tag.index')->with('success', 'tag deleted!');

    }
}

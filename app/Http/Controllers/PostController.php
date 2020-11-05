<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
      $tags = Tag::all();
        $posts = Post::orderby('created_at','desc')->paginate(5);
        return view('admin.post.index',compact('posts'));
    }

    public function create()
    {
      $tags = Tag::all();
      $categories = Category::all();
      return view('admin.post.create', compact('categories','tags'));
    }


    public function store(Request $request)
    {

      $validatedData = $request->validate([
        'title' => 'required|unique:posts,title|max:255',
        'image' => 'required|image',
        'description' => 'required',
        'category' => 'required',
    ]);

    if ($request->hasFile('image')) {
          $image = $request->image;
          $name = time().'.'.$image->getClientOriginalExtension();
          $destinationPath = public_path('/images');
          $image->move($destinationPath, $name);
      }

    $post= Post::create([
      'title'=> $request->title,
      'category_id'=> $request->category,
      'slug'=> Str::slug($request->title, '-'),
      'description'=> $request->description,
      'image'=> $name,
      'user_id'=> auth()->user()->id,
      'published_at'=> time(),
    ]);
    $post->tags()->attach($request->tags);


    return redirect('admin/post/create')->with('success', 'post created!');

    }

    public function show(Post $post)
    {
      $categories = Category::all();
      $tags = Tag::all();
      return view('admin.post.show',compact('post','categories','tags'));
    }

    public function edit(Post $post)
    {
      $categories = Category::all();
      $tags = Tag::all();
      return view('admin.post.edit',compact('post','categories','tags'));

    }

    public function update(Request $request, Post $post)
    {

        $validatedData = $request->validate([
          'title' => "required|unique:posts,title,$post->id",
          'description' => 'required',
          'category' => 'required',
      ]);

      if ($request->hasFile('image')) {
            $image = $request->image;
            $uimgname = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $uimgname);
            $post->image= $uimgname;
        }


        $post->title= $request->title;
        $post->category_id= $request->category;
        $post->slug= Str::slug($request->title, '-');
        $post->description= $request->description;
        $post->user_id= auth()->user()->id;
        $post->published_at = time();
        $post->tags()->sync($request->tags);
        $post->save();

      return redirect('admin/post')->with('success', 'post updated!');
    }


    public function destroy(Post $post)
    {
        if ($post) {
          $post->delete();
          return redirect('admin/post')->with('success', 'post deleted!');
        }
    }
}
